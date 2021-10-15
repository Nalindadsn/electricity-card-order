
   $(document).ready(function () {

    let myObj_deserialized=JSON.parse(localStorage.getItem('myObj'))
    console.log(myObj_deserialized.fontSizeV)
    if (myObj_deserialized.fontSizeV) {
        $('#sidenav-collapse-main > ul *').css({'fontSize':myObj_deserialized.fontSizeV+'px'});
        $("<style>body > div > div.container-fluid.mt--7 *{font-size:"+myObj_deserialized.fontSizeV+"px;}</style>").appendTo("head")

    }else{
        $('#sidenav-collapse-main > ul *').css({'fontSize':'15px'})
        $("<style>#user_data *{font-size:15px;}</style>").appendTo("head")

    } 

})