function addlike(post_id, user_id) {
    // document.querySelector('button[id*="like_btn_"]').addEventListener('click', function (event) {
    const formData = {
        post_id,
        user_id
    }

    const apiEndpoint = 'http://localhost/newproject/api.php?action=like';

    // Create an object with the data to be sent in the POST request

    $.ajax({
        url: apiEndpoint,
        method: 'POST',
        data: formData,
        dataType: 'json',
        success: function (data) {
            // Handle the JSON data returned by the API
            console.log(data);
            const element = document.querySelector(`#like_btn_${formData.post_id} > .text-primary`)
            console.log(element)
            if(element){
                element.classList.remove("text-primary");
                
            }
            else{
                document.querySelector(`#like_btn_${formData.post_id} > i`).classList.add("text-primary");

            }
            // You can process the response data here
        },
        error: function (xhr, status, error) {
            // Handle errors if the request fails
            console.error('Error:', status, error);
        }
    });
    // });
}
function addcomment(post_id, user_id) {
    // document.querySelector('button[id*="like_btn_"]').addEventListener('click', function (event) {


    const msg = document.querySelector(`.comment_${post_id}`)
    const comment = msg.value

    const formData = {
        post_id,
        user_id,
        comment
    }

    const apiEndpoint = 'http://localhost/newproject/api.php?action=comment';

    // Create an object with the data to be sent in the POST request

    $.ajax({
        url: apiEndpoint,
        method: 'POST',
        data: formData,
        dataType: 'json',
        success: function (data) {
            // Handle the JSON data returned by the API
            console.log(data);
            // document.querySelector(`#like_btn_${formData.post_id}`).setAttribute('style', 'color: blue;')
            // You can process the response data here
        },
        error: function (xhr, status, error) {
            // Handle errors if the request fails
            console.error('Error:', status, error);
        }
    });
    // });
    const getCommentHtml = (object) => {
        return `
        <div class="border rounded-lg pl-4 mt-2">
        <div>You commented</div>
        <div class="ml-2 ">
            ${formData.comment}
        </div>
    </div>
`}
    msg.value = ""
    return document.querySelector(`.comment-content > .comment-${formData.post_id}`).parentElement.innerHTML += getCommentHtml(formData)
}