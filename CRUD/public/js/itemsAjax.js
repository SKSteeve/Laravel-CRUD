$(document).ready( function () {
    var base_path = $("#url").val();

    $('#searchBtn').on('click', function(e) {
        console.log("Event on click search:");
        e.preventDefault();
    
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      
        $.ajax({
          url: "items",
          type: "POST",
          data: $('form').serialize(),
          success: searchResponse,
          error: errorReturned
        });
    });
    
    function searchResponse(data) {
        console.log("successfull ajax request");
        console.log(data.params);
        let students = data.students;
        
        let tBody = $('table tbody');
        tBody.empty();

        let i = 1;
        for(let student in students) {
            let id = students[student].id;

            let tr = $('<tr>');
            let numOfRowColumn = $('<th>');
            numOfRowColumn.text(i);
            tr.append(numOfRowColumn);

            for(let item in students[student]) {
                let th = $('<th>');
                let anchorTag = $('<a>');

                if(item !== "created_at" && item !== "updated_at" && item !== "deleted_at") {
                    th.text(students[student][item]);
                    if(item === "subject" && students[student][item] !== null) {
                        let subjectNumber = students[student][item];
                        let subject = {
                            1: 'Биоинформатика',
                            2: 'Биохимия',
                            3: 'Екология',
                            4: 'Биоинженерство'
                        };
                        th.text(`${subject[subjectNumber]}`);
                    }
                } else if(item === "created_at") {                    // here we are on column "Редактиране"
                
                    let urlPage = '';
                    let bootstrapClass = '';
                    let text = '';

                    if(students[student]['deleted_at'] !== null ) {
                        urlPage = 'restore';
                        bootstrapClass = 'btn btn-secondary';
                        text = 'Възстанови';
                    } else {
                        urlPage = 'item';
                        bootstrapClass = 'btn btn-primary';
                        text = 'Редактирай';
                    }
                    anchorTag.attr("href", `${base_path}/${urlPage}/${id}`);
                    anchorTag.addClass(`${bootstrapClass}`);
                    anchorTag.text(`${text}`);

                    th.append(anchorTag);

                } else if (item === "updated_at") {             // here we are on column "Изтриване"
                    
                    anchorTag.attr("href", `${base_path}/delete/${id}`);
                    anchorTag.attr("id", `${id}`);
                    anchorTag.addClass("btn btn-danger");
                    if(students[student]['deleted_at'] !== null) {
                        let icon = $('<i>');
                        icon.addClass("fas fa-trash-alt");
                        anchorTag.append(icon);
                    } else {
                        anchorTag.text('Изтрий');
                    }
                    anchorTag.on('click', function (e) {
                        e.preventDefault();
                        deleteFunc(id);
                    });

                    th.append(anchorTag);
                } else if (item === "deleted_at") {
                    break;
                }

                tr.append(th);
            }
            
            tBody.append(tr);
            i++;
        }
        
    }

    function deleteFunc(id) {
        console.log('Event on click delete:');

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        
          $.ajax({
            url: `delete/${id}`,
            type: "POST",
            data: {
                id: id,
            },
            success: function (dataFromServer) {
                deletedInfo(dataFromServer, id)
            },
            error: errorReturned
          });
    }

    function deletedInfo(dataFromServer, id) {
        console.log('successfull ajax request');
        console.log(dataFromServer.hardOrSoft);
        $('.ajaxMessageSession').remove();
        console.log(dataFromServer);
        if(dataFromServer.hardOrSoft === 'soft') {
            let a = $(`#${id}`);
            let icon = $('<i>');
            icon.addClass("fas fa-trash-alt");
            a.text('');
            a.append(icon);
                    
            let aRepair = a.parent().prev().find('a');

            aRepair.attr("href", `${base_path}/restore/${id}`);
            aRepair.addClass('btn btn-secondary');
            aRepair.text('Възстанови');

        } else {
            $(`#${id}`).parent().parent().remove();
        }

        let ajaxMsg = $('.ajaxMessage');
        ajaxMsg.addClass(`alert alert-${dataFromServer.messageStatus}`);
        ajaxMsg.text(`${dataFromServer.message}`);
    }

    function errorReturned(error) {
        console.log("error in ajax");
        console.log(error);
    }

    $('.newSearching').on('click', function(e) {
        e.preventDefault();
        $('form').trigger("reset");
    });

    $('a, button').focus(function() {
        this.blur();
    });
});