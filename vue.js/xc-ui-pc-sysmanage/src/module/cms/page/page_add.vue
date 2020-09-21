
<template>
    <div>
        新增页面
<el-form  type="post" :model="pageForm" label-width="80px" :rules='pageFromRules' ref="pageForm">
  <el-form-item label="所属站点" prop="siteId">
    <el-select v-model="pageForm.siteId" placeholder="请选择站点">
      <el-option
        v-for="item in siteList"
        :key="item.siteId"
        :label="item.siteName"
        :value="item.siteId">
      </el-option>
    </el-select>
  </el-form-item>
  <el-form-item label="选择模版" prop="templateId">
    <el-select v-model="pageForm.templateId" placeholder="请选择">
      <el-option
        v-for="item in templateList"
        :key="item.templateId"
        :label="item.templateName"
        :value="item.templateId">
      </el-option>
    </el-select>
  </el-form-item>
  <el-form-item label="页面名称" prop="pageName">
    <el-input v-model="pageForm.pageName" auto-complete="off" ></el-input>
  </el-form-item>
  <el-form-item label="别名" prop="pageAliase">
    <el-input v-model="pageForm.pageAliase" auto-complete="off" ></el-input>
  </el-form-item>
  <el-form-item label="访问路径" prop="pageWebPath">
    <el-input v-model="pageForm.pageWebPath" auto-complete="off" ></el-input>
  </el-form-item>
  <el-form-item label="物理路径" prop="pagePhysicalPath">
    <el-input v-model="pageForm.pagePhysicalPath" auto-complete="off" ></el-input>
  </el-form-item>
  <el-form-item label="类型">
    <el-radio-group v-model="pageForm.pageType">
      <el-radio class="radio" label="0">静态</el-radio>
      <el-radio class="radio" label="1">动态</el-radio>
    </el-radio-group>
  </el-form-item>
  <el-form-item label="创建时间">
    <el-date-picker type="datetime" placeholder="创建时间" v-model="pageForm.pageCreateTime">
</el-date-picker>
  </el-form-item>
</el-form>
<div slot="footer" class="dialog-footer">
  <el-button type="primary" @click="addSubmit" >提交</el-button>
  <el-button type="primary" @click="go_back" >返回</el-button>
</div>
    </div>

</template>
<script>
       import * as cmsApi from '../api/cms'
export default {
    data(){
        return {
            pageForm:{
              siteId:'',
              templateId:'',
              pageName: '',
              pageAliase: '',
              pageWebPath: '',
              pageParameter:'',
              pagePhysicalPath:'',
              pageType:'',
              pageCreateTime: new Date()
            },
            // 表单校验
            pageFromRules: {
                siteId: [
                    { required:true,message:'请选择站点', trigger: 'blur' }
                ],
                pageName: [
                    {required:true,message:'请输入页面名称', trigger:'blur'}
                ]
            },
            siteList:[],
            templateList:[]
        }
    },
    methods:{
        addSubmit:function(){
            this.$refs['pageForm'].validate((valid) => {
                // 校验表单
                if (valid) {
                    // 确认提示
                        this.$confirm('confirm', '提示', {
                        confirmButtonText: '确定',
                        cancelButtonText: '取消',
                        // type: 'warning'
                        }).then(() => {
                            cmsApi.add_page(this.pageForm).then(res=>{
                                // 解析服务端响应内容
                                if (res.success) {
                                    // element提供的组件
                                    this.$message.success("提交成功")
                                    // 清空表单
                                    this.$refs['pageForm'].resetFields()
                                }else{
                                    this.$message.error('提交失败')
                                }
                            })
                        }).catch(() => {
                            this.$message({
                                type: 'info',
                                message: '已取消'
                            });          
                        });
                    // alert('submit!');
                } 
                // else {
                //     console.log('表单校验失败');
                //     return false;
                // }
            });
            this.savePage()
        },
        go_back:function() {
            // 设置路由
            this.$router.push({
                path:'/cms/page/list',
                query:{
                    current_page:this.$route.query.current_page,  // 取出路由中的参数
                    siteId:this.$route.query.siteId
                }
            })
        },
        queryCmsSite:function(){
            cmsApi.all_site_list().then((result)=>{
                this.siteList = result.queryResult.list
            })
        },
        queryCmsTemplate:function(){
            cmsApi.all_template_list().then((result)=>{
                this.templateList = result.queryResult.list
            })
        },
        savePage:function(params){
            cmsApi.save_page()
            // alert("提交")    
        }
    },
    mounted(){
        this.queryCmsSite()
        this.queryCmsTemplate()
    }
}
</script>
<style>

</style>