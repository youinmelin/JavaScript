import http from './../../../base/api/public'
import querystring from 'querystring'
let sysConfig = require('@/../config/sysConfig')
let apiUrl = sysConfig.xcApiUrlPre;

//查询课程列表 已连接后台
export const findCourseList = (page,size,params) => {
//使用工具类将json对象转成key/value
  let queries = querystring.stringify(params)
  return http.requestQuickGet(apiUrl+"/course/coursebase/list/"+page+"/"+size+"?"+queries)
}

//查询课程分类 已连接后台
export const category_findlist= () => {
  return http.requestQuickGet(apiUrl+'/category/list')
}
/*添加课程基础信息 已连接后台*/
export const addCourseBase = params => {
  return http.requestPost(apiUrl+'/course/coursebase/add',params)
}
/*修改课程基础信息 已连接后台*/
export const updateCoursebase = (courseid,params) => {
  return http.requestPut(apiUrl+'/course/coursebase/update/'+ courseid,params)
}

/*查询课程计划 已连接后台*/
export const findTeachplanList = courseid => {
  return http.requestQuickGet(apiUrl+'/course/teachplan/list/'+courseid)
}

/*查询课程基础信息 已连接后台*/
export const getCoursebaseById = courseid => {
  return http.requestQuickGet(apiUrl+'/course/coursebase/byid/'+courseid)
}
/*添加课程计划 已连接后台*/
export const addTeachplan = teachplah => {
  return http.requestPost(apiUrl+'/course/teachplan/add',teachplah)
}

/*查询课程营销数据*/
export const getCourseMarketById = courseid => {
  return http.requestGet(apiUrl+'/course/coursemarket/get/'+courseid)
}

//保存课程图片地址到课程数据库
export const addCoursePic= (courseId,pic) => {
  return http.requestPost(apiUrl+'/course/coursepic/add?courseId='+courseId+"&pic="+pic)
}
//查询课程图片
export const findCoursePicList = courseId => {
  return http.requestQuickGet(apiUrl+'/course/coursepic/list/'+courseId)
}

//删除课程图片
export const deleteCoursePic= courseId => {
  return http.requestDelete(apiUrl+'/course/coursepic/delete?courseId='+courseId)
}
/*预览课程*/
export const preview = id => {
  return http.requestPost(apiUrl+'/course/preview/'+id);
}
/*发布课程*/
export const publish = id => {
  return http.requestPost(apiUrl+'/course/publish/'+id);
}
//查询课程信息
export const findCourseView = courseId => {
  return http.requestQuickGet(apiUrl+'/course/courseview/'+courseId)
}

/*保存媒资信息*/
export const savemedia = teachplanMedia => {
  return http.requestPost(apiUrl+'/course/savemedia',teachplanMedia);
}
