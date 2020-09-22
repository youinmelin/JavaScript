<template>
    <!-- view部分 页面展示-->
    <div>
      <el-form :model="params">
        <el-select v-model="params.siteId" placeholder="请选择站点">
          <el-option
            v-for="item in siteList"
            :key="item.siteId"
            :label="item.siteName"
            :value="item.siteId">
          </el-option>
        </el-select>
        页面别名：<el-input v-model="params.pageAliase" style="width: 100px"/>
        <button v-on:click="query">search</button>

        <!-- router-link: 实现链接跳转 渲染后就是<a标签 :to转到指定的路由地址 -->
        <router-link class="mui-tab-item" :to="{path:'/cms/page/add',
                query:{ current_page:this.params.current_page, siteId:this.params.siteId }}">
          <el-button type="primary" size="small">add page</el-button>
        </router-link>

      </el-form>

      <el-table :data="list" stripe style="width: 100%">
        <el-table-column prop="pageName" label="pageName" width="270"/>
        <el-table-column prop="pageAliase" label="pageAliase" width="180"/>
        <el-table-column prop="pageType" label="pageType" width="120"/>
        <el-table-column prop="pageCreateTime" label="pageCreateTime" width="280"/>
        <el-table-column label="操作" width="120"> 
          <!-- slot-scope="page"  从插槽中取得列表数据 -->
          <template slot-scope="page">
                <el-button  type="text" size="small" @click="modify(page.row.pageId)"> modify </el-button>
                <el-button  type="text" size="small" @click="del(page.row.pageId)"> del </el-button>
          </template>
    </el-table-column>
      </el-table>
    <el-pagination :page-size="params.page_size" :pager-count="11" 
        :current-page="params.current_page" layout="prev, pager, next" :total="total"
        @current-change="changePage">
  </el-pagination>
  page size: <input type="text" v-model="params.page_size"><button @click="query">confirm</button>
  total: {{total}} records, current_page: {{params.current_page}}
    </div>
</template>
<script>
// model and VM
// 导入cms.js （.js可以省略）
import * as cmsApi from '../api/cms'

export default {
    data() {
      return {
        "list": [],
        "siteList":[], // 站点列表
        "total": 0,
        params:{
          'current_page':1,
          'page_size':3,
          'siteId':'',
          'pageAliase':''
        }
      }
    },
    methods:{
        query:function(){
            cmsApi.page_list(this.params.current_page, this.params.page_size,this.params).then((res)=>{
              // 当从服务端拿到数据(result)后执行(then回调方法中的)方法体，将res（响应数据)结果数据赋值给数据模型对象
              // res= {"code":0,"message":"string",
              //          "queryResult":{"list":[{}],"total":0},"success":true}
              this.total = res.queryResult.total
              this.list = res.queryResult.list
          })
        },
        queryCmsSite: function() {
            cmsApi.all_site_list().then((res)=>{
              // { "code": 0, "message": "string", "queryResult": { "list": [ {} ], "total": 0 }, "success": true }
              this.siteList = res.queryResult.list
            })
        },
        changePage:function(page){   //形参page就是当前页码
            // alert('change page')
            this.params.current_page = page
            this.query()
        },
        modify:function(pageId) {  
          // 进入修改页面
          this.$router.push({  // 改变路由，得以跳转页面
            // 通过url传参
            path:'/cms/page/modify/' + pageId,
            // query:{
            //   page: this.params.current_page,
            //   siteId: thisparams.siteId
            // }
          })
        },
        del:function(pageId) {
              // this.$confirm('confirm','notice',{}).then(()=>{})
              // 删除之前弹框提示
              this.$confirm('confirm','notice',{}).then(()=>{
                cmsApi.page_del(pageId).then(res=>{
                if(res.succeess) {
                  this.$message.succeess(res.message)
                }else{
                  this.$message.error(res.message)
                }
                this.query()
              })
          
          })
        },
    },
    created() {
      // 钩子方法：dom渲染之前执行
      // 如果跳转过来的路由有参数，就接收并给数据对象赋值

      this.params.current_page = Number.parseInt(this.$route.query.current_page || 1 )
      this.params.siteId =  this.$route.query.siteId || ''

    },
    mounted(){
      // 钩子方法：mounted，当DOM元素渲染完成后调用
      this.query()
      this.queryCmsSite()
    }
  }
  
</script>
<style>

</style>