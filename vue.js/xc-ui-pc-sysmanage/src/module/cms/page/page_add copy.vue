
<template>
    <div>
        新增页面
        <el‐form  :model="pageForm" label‐width="80px"  >
              <el‐form‐item label="所属站点" prop="siteId">
                <el‐select v‐model="pageForm.siteId" placeholder="请选择站点">
                  <el‐option
                    v‐for="item in siteList"
                    :key="item.siteId"
                    :label="item.siteName"
                    :value="item.siteId">
                  </el‐option>
                </el‐select>
              </el‐form‐item>
              <el‐form‐item label="选择模版" prop="templateId">
                <el‐select v‐model="pageForm.templateId" placeholder="请选择">
                  <el‐option
                    v‐for="item in templateList"
                    :key="item.templateId"
                    :label="item.templateName"
                    :value="item.templateId">
                  </el‐option>
                </el‐select>
              </el‐form‐item>
              <el‐form‐item label="页面名称" prop="pageName">
                <el‐input v‐model="pageForm.pageName" auto‐complete="off" ></el‐input>
              </el‐form‐item>
              <el‐form‐item label="别名" prop="pageAliase">
                <el‐input v‐model="pageForm.pageAliase" auto‐complete="off" ></el‐input>
              </el‐form‐item>
              <el‐form‐item label="访问路径" prop="pageWebPath">
                <el‐input v‐model="pageForm.pageWebPath" auto‐complete="off" ></el‐input>
              </el‐form‐item>
              <el‐form‐item label="物理路径" prop="pagePhysicalPath">
                <el‐input v‐model="pageForm.pagePhysicalPath" auto‐complete="off" ></el‐input>
              </el‐form‐item>
              <el‐form‐item label="类型">
                <el‐radio‐group v‐model="pageForm.pageType">
                  <el‐radio class="radio" label="0">静态</el‐radio>
                  <el‐radio class="radio" label="1">动态</el‐radio>
                </el‐radio‐group>
              </el‐form‐item>
              <el‐form‐item label="创建时间">
                <el‐date‐picker type="datetime" placeholder="创建时间" v‐model="pageForm.pageCreateTime">
            </el‐date‐picker>
              </el‐form‐item>
            </el‐form>
            <div slot="footer" class="dialog‐footer">
              <el‐button type="primary" @click="addSubmit" >提交</el‐button>
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
            siteList:[],
            templateList:[]
        }
    },
    methods: {
        querySite: function(){
            cmsApi.all_site_list().then((res)=>{
                this.siteList = res.queryResult.list
            })
        },
        addSubmit:function() {
            alert("submit")
        }
    },
    mounted(){
        this.querySite()
    }
  
}
</script>
<style>

</style>