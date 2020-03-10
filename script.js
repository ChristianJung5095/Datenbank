var table = $('#table_id').DataTable();
table.columns([4]).visible(false);


//Code zum ausführen des DataTable scriptes
$(document).ready(function () {
    $('#table_id').DataTable();


    //CODE FOR JQUERY WITH INSERT NEW DATA

    $('#submit').on('click', function () {
        console.log("direkt unter submit")
        var vorname = $('#vorname').val();
        var nachname = $('#nachname').val();
        var adresse = $('#adresse').val();
        var plz = $('#plz').val();
        var ID = "0";
        var bttn = '<button type="button" class="bttn1" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fa fa-trash"></i></button><button type="button" class="bttn2" data-toggle="modal" data-target="#myModal2"><i class="fa fa-folder"></i></button>';

        if (vorname != "" && nachname != "") {
            $.ajax({
                type: 'POST',
                url: 'register.php',
                data: { vorname: vorname, nachname: nachname, adresse: adresse, plz: plz },
                success: function (data) {
                    $('#myModal input[type="text"]').val('');
                    //$('#myModal').modal('dispose');
                }
            })
            table.row.add([
                vorname,
                nachname,
                adresse,
                plz,
                ID,
                bttn
            ]).draw();
        }
    });




    //JQUERY WITH DELETE SELECTED DATA
    $('#confirm').on('click', function () {
        console.log("Blin it is good");
    })




    $('.display tbody').on('click', '#confirm', function () {
        console.log("Hello Blin");
        var tr = $(this).closest('tr'); //Variable tr bezeichnet die derzeitig ausgwewählte Tabellenreihe
        var row = table.row(tr); //Definieren des derzeitig ausgewählten Daten Reihe 
        console.log(row.data()); // Ausgabe der Daten von der derzeitig ausgewählten Reihe
        console.log(row.data()[1]);
        var vorname = row.data()[0];
        var nachname = row.data()[1];
        var adresse = row.data()[2];
        var plz = row.data()[3];

        $.ajax({
            type: 'POST',
            url: 'register.php',
            data: { vorname2: vorname, nachname2: nachname, adresse2: adresse, plz2: plz, click: true },
            success: function (data) {

                //document.getElementById('hello').innerHTML = this.responseText;
                tr.remove();


            }
        })
    })


    //JQUERY WHERE I UPDATE THE DATA OF A SINGLE SELECTED ROW
    $(document).ready(function () {

        $('.display tbody').on('click', '.bttn2', function () {
            var tr = $(this).closest('tr') //Variable tr bezeichnet die derzeitig ausgwewählte Tabellenreihe
            var row = table.row(tr); //Definieren des derzeitig ausgewählten Daten Reihe 
            console.log(row.data());
            var vorname3 = row.data()[0];
            var nachname3 = row.data()[1];
            var adresse3 = row.data()[2];
            var plz3 = row.data()[3];
            var ID = row.data()[4];


            //Hier werden die Werte in die Felder eingetragen
            document.getElementById("vorname2").value = vorname3;
            document.getElementById("nachname2").value = nachname3;
            document.getElementById("adresse2").value = adresse3;
            document.getElementById("plz2").value = plz3;

            $('#submit2').on('click', function () {
                var temp = table.row(tr).data();
                click2 = true;
                temp[0] = document.getElementById("vorname2").value;
                temp[1] = document.getElementById("nachname2").value;
                temp[2] = document.getElementById("adresse2").value;
                temp[3] = document.getElementById("plz2").value;
                var vorname4 = temp[0];
                var nachname4 = temp[1];
                var adresse4 = temp[2];
                var plz4 = temp[3];
                console.log(temp);
                table.row(tr).data(temp).draw();

                $.ajax({
                    type: 'POST',
                    url: 'register.php',
                    data: { vorname3: vorname4, nachname3: nachname4, adresse3: adresse4, plz3: plz4, click2: true, ID: ID },
                    success: function (data) {

                        //alert(data);
                    }
                })

            })

        })

    })


});

//JQUERY WHERE I GIVE OUT THE INFORMATION OF THE ROW


