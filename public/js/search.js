var $name = $('.search > input');



$name.on('change keyup', function (){
    axios.get('/name?filter[gender]=f')
        .then(function (response) {
            // handle success

            renderResponse(response)
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })

})

function renderResponse(res) {
    console.log(res.data);
}
