fetch('fidelityCards').then(
    function(response) {
        if (response.status !== 200) {
            console.log('Looks like there was a problem. Status Code: ' + response.status)
            return
        }

        response.json().then(function(data) {

            var element = document.getElementById("loader-fidelitycards");
            element.parentNode.removeChild(element);

            if(data.data.length == 0)
            {
                document.getElementById("fidelitycards").innerHTML = "<p>You don't have any fidelity cards...</p>"
            }
            else
            {
                data.data.forEach(element => {
                    let html = "<div class='card mb-3 color_card_" + element.card_color_id + "'>"
                    html += "<div class='card-body'>"
                    html += "<h3 class='card-title mb-0'>" + element.company_name + "</h3>"
                    html += "<p><strong>" + element.message_to_user + "</strong></p>"
                    if(!element.has_reward)
                    {
                      html += "<p class='mb-0'>Your fidelity points is <strong>" + element.current_number_of_points + "/" + element.total_number_of_points +"</strong></p>"
                    }
                    else
                    {
                      html += "<p class='mb-0'><strong>You can reclaim your reward ! </strong></p>"
                    }
                    html += "</div>"
                    html += "</div>"
                    document.getElementById("fidelitycards").innerHTML += html
                })
            }

        })
    }
).catch(function(err) {
    console.log('Fetch Error : ', err)
})
