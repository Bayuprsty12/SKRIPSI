let tegangan = 0;
let arus = 0;
let daya = 0;
let energi = 0;
let waktu = 0;

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
    
        let run_ajax = false;

        $("#info-tegangan").html(value.result[0].tegangan + "<sup style = \"font-size: 20px\"> volt</sup>");
        $("#info-arus").html(value.result[0].arus + "<sup style = \"font-size: 20px\"> amp</sup>");
        $("#info-daya").html(value.result[0].daya + "<sup style = \"font-size: 20px\"> watt</sup>");
        $("#info-energi").html(value.result[0].energi + "<sup style = \"font-size: 20px\"> kwh</sup>");
        $("#info-waktu").html(value.result[0].waktu + "<sup style = \"font-size: 20px\"> Menit</sup>");  
       
        //fungsi banding data for kirim notif email 1x
        if(value.result[0].tegangan != tegangan){
            tegangan = value.result[0].tegangan;
            run_ajax = true;
        }
        if(value.result[0].arus != arus){
            arus = value.result[0].arus;
            run_ajax = true;
        }
        if(value.result[0].daya != daya){
            daya = value.result[0].daya;
            run_ajax = true;
        }
        if(value.result[0].energi != energi){
            daya = value.result[0].energi;
            run_ajax = true;
        }
        if(value.result[0].waktu != waktu){
            waktu = value.result[0].waktu;
            run_ajax = true;
        }

        if(run_ajax){
            $.ajax({
                type: "POST",
                url: "asset/fuzzy/get_fuzzy.php",
                data: {
                    "daya" : value.result[0].daya,
                    "waktu" : value.result[0].waktu,
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

        
    });

}
