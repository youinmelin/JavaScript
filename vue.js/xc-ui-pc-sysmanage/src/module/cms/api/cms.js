import http from '../../../base/api/public'
import querystring from 'querystring'
let sysConfig = require('@/../config/sysConfig')
// let sysConfig = require('../../../../config/sysConfig')
let apiUrl = sysConfig.xcApiUrlPre;

// 定义方法
export const page_list = (page,size,params) => {
    // 使用qyerystring工具类拼装get请求url
    let queryString = querystring.stringify(params)
    // 请求服务端页面查询的接口
    return http.requestQuickGet(apiUrl + '/cms/page/listExample/'+page+'/'+size+'?'+queryString)
    // return http.requestQuickGet(apiUrl + '/cms/page/listExample/'+page+'/'+size+'?siteId='+params.siteId+'&pageAliase='+params.pageAliase)
    // http.requestQuickGet( 'http://localhost:31001/cms/page/list/'+page+'/'+size)
}

export const all_site_list = () => {
    // 请求服务端site查询的接口
    return http.requestQuickGet(apiUrl + '/cms/site/all')
}

export const all_template_list = () => {
    // 请求服务端site查询的接口
    return http.requestQuickGet(apiUrl + '/cms/template/all')
}

export const add_page = params =>{
    return http.requestPost(apiUrl + '/cms/page/add' , params)
}


