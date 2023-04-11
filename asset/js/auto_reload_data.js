let tegangan = 0;
let arus = 0;
let daya = 0;
let energi = 0;

let sensor_status;
let init_time = 0;
let on_count_time = 0;

let time_used = 0;
let real_time_used = 0;

$(document).ready(function(){
    auto_load_data();
    //console.log("test heloo world");
    
    updateData();
});

function auto_load_data() {
    setTimeout(function (){
        updateData();

        auto_load_data();
    }, 2000);
}

function updateData() {
    $.getJSON("data/data_sensor.php", function(value){
        // set data to small box info

        let fixed_time = 0;
        //console.log(value);
        //console.log(value.result[0].tegangan);
        sensor_status = value.result[0].status;
        console.log(sensor_status);

        if(sensor_status === "start"){
            tegangan = value.result[0].tegangan;
            arus = value.result[0].arus;
            daya = value.result[0].daya;
            energi = value.result[0].energi;
            init_time = Date.parse(value.result[0].timestamp);
            console.log(init_time);
        }else if(sensor_status === "on_count"){

            //check waktu
            if(on_count_time != value.result[0].timestamp){
                on_count_time = Date.parse(value.result[0].timestamp);
        
                //count time
                time_used = on_count_time - init_time;
                //convert to minutes
                real_time_used = (time_used/1000)/60;
                fixed_time = real_time_used;
                console.log(real_time_used);

                $.ajax({
                    type: "POST",
                    url: "asset/fuzzy/get_fuzzy.php",
                    data: {
                        "daya" : value.result[0].daya,
                        "waktu" : real_time_used,
                    },
                    success: function(response){
                        console.log(response);
                        $("#info-status").html(response);
                    },
                    error: function(xhr, thrownError){
                        console.log ('error');
                        console.log(xhr.status);
                        console.log(thrownError);
                    },
                });
            }
        }else if(sensor_status === "stop"){
            tegangan = 0;
            arus = 0;
            daya = 0;
            energi = 0;
            init_time = 0;
            real_time_used = 0;
            $("#info-status").html("--");
        }

        $("#info-tegangan").html(tegangan + "<sup style = \"font-size: 20px\"> volt</sup>");
        $("#info-arus").html(arus + "<sup style = \"font-size: 20px\"> amp</sup>");
        $("#info-daya").html(daya + "<sup style = \"font-size: 20px\"> watt</sup>");
        $("#info-energi").html(energi + "<sup style = \"font-size: 20px\"> kwh</sup>");
        $("#info-waktu").html(fixed_time.toFixed(2) + "<sup style = \"font-size: 20px\"> Menit</sup>");  
        
    });

}
