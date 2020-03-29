;(function (window, undefined) {
   function Parent (options){
       options = options || {}
       this.width = options.width || 20
       this.height = options.height || 20
   } 
   Parent.prototype.changeColor = function(){
       console.log('changeColor')
   }
   window.Parent = Parent
})(window, undefined)