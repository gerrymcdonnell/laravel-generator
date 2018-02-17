//custom js file
let axios=require('axios');

console.log('custom.js axios script loaded');

$('body').on('click','.delete-photo',function(){

    id=$(this).data('id');

    //do a delete to this url
    axios.delete('/photos/'+id)
        .then(function(){
            window.location.reload();
        })
        .catch(function(error){
            alert(error);
    })
});

