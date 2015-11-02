
  <style>
#main {
    position: relative;
    width: 600px;
    height: 202px;
    margin: 0 auto;
    text-decoration: none;
    padding: 0;
}
 
.content{
    width: 150px;
    height: 200px;
    border: 1px solid #453D3D;
    border-radius: 10px;
    float: left;
    vertical-align: top;
    position: relative;
    display: none;
    list-style: none;
}
 
.content>span{
    display: block;
}
 
/*@media (max-width: 480px){*/
    #main{
        width: 420px;
        display: inline-block;
    }
 
    #next{
        background: #ccc;
        width: 20px;
        height: 20px;
        margin: 0 auto;
        display: inline-block;
    }
    #next:before {
        content: 'aaa';
    }
    
    #prev{
        background: #ccc;
        width: 20px;
        height: 20px;
        margin: 0 auto;
        display: inline-block;
    }   
    #prev:after {
        content: 'ddd';
    }
</style>
  <script>
 $(document).ready(function(){
    var li = $('#main').children();
    var first = li.first();
    var second = first.next();
    first.show();
    second.show();
    $('#next').click(function(){
        if(second.next().text() == ''){
        first.hide(500);
        second.hide(500);
        first = li.first(); 
        second = first.next();
        first.show(500);
        second.show(500);
        }
        else{
        first.hide(500);
        second.hide(500);
        first = second;
        second = second.next();
        first.show(500);
        second.show(500);
        }
    });
    $('#prev').click(function(){
        if(first.prev().text() == ''){
        first.hide(500);
        second.hide(500);
        first = li.last(); 
        second = first.prev();
        first.show(500);
        second.show(500);
        }
        else{
        first.hide(500);
        second.hide(500);
        first = first.prev();
        second = first.prev();
        first.show(500);
        second.show(500);
        }
    });
    
});
  </script>

    <i id="prev"></i>
    
    <ul id="main">
        <li class="content">
            <span>11111111111</span>
            <span>11111111111</span>
            <span>11111111111</span>
        </li>
        <li class="content">
            <span>22222222222</span>
            <span>22222222222</span>
            <span>22222222222</span>
        </li>
        <li class="content">
            <span>33333333333</span>
            <span>33333333333</span>
            <span>33333333333</span>
        </li>
        <li class="content">
            <span>44444444444</span>
            <span>44444444444</span>
            <span>44444444444</span>
        </li>
    </ul>
    <i id="next"></i>
