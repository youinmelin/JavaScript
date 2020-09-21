import Home from '@/module/home/page/home.vue';
import page_list from '@/module/cms/page/page_list.vue';
import page_add from '@/module/cms/page/page_add.vue';
export default [{
    path: '/', // 在浏览器中输入的url
    component: Home, // 该路径要引用的组件
    // name: '系统管理首页',  //菜单名称
    name: 'CMS manage',  //菜单名称
    hidden: false, // 显示 
    // ,
    // redirect: '/home',
    children: [
      {path: '/cms/page/list', name:'page list',component: page_list,hidden:false},
      {path: '/cms/page/add', name:'page add',component: page_add,hidden:false}
    ]
  }/*,
  {
    path: '/login',
    component: Login,
    name: 'Login',
    hidden: true
  }*/
]
