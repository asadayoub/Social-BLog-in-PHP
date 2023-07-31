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
                document.querySelector(`#like_btn_${formData.post_id}`).setAttribute('style', 'color: blue;')
                // You can process the response data here
            },
            error: function (xhr, status, error) {
                // Handle errors if the request fails
                console.error('Error:', status, error);
            }
        });
    // });
}