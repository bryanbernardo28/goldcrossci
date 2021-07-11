$(function(){
    $("button.modal-normal").on("click",function(){
        let hasRadioChecked = $("table.choices > tbody  > tr").find("td:eq(2) input:radio").is(":checked");
        if(hasRadioChecked){
            $("select.is-correct-answer").attr('disabled','disabled');
        }
        $("#modal-normal").modal('toggle');
    });


    $("button.save-choice").on("click",function(){
        let choiceText = $("#choiceInput").val();
        let rowCount = countChoices();

        if(!isEmptyString(choiceText)){
            resetErrorValidation();
            let correctSelect = $("#correctSelect").val();
            var choiceNumberRow = 65+rowCount;
            let rowLetter = String.fromCharCode(choiceNumberRow);
            var removeId = rowCount+1;
            var tableData = "<tr id='tableRow"+choiceNumberRow+"'>";
            tableData += "<td><input type='text' name='choiceLetter[]' value='"+rowLetter+"' class='form-control' readonly></td>";
            tableData += "<td><input type='text' name='choiceText[]' value='"+choiceText+"' class='form-control' readonly></td>";

            var isCorrectAnswer = correctSelect === 'true' ? "checked" :"";
            var isCorrectRadioButton = '<label class="radio-inline">'+
                                        '<input type="radio" name="isCorrect" id="inlineRadio1" '+isCorrectAnswer+' value="'+rowLetter+'"> Correct Answer'+
                                        '</label>';
            
            var actionRow = "<button type='button' class='btn btn-sm btn-danger btn-flat remove-choice'>Remove</button>";
            
            tableData += "<td>"+isCorrectRadioButton+"</td>";
            tableData += "<td>"+actionRow+"</td>";
            tableData += "</tr>";


            $("tbody.exam-table-body").append(tableData);
            $("#choiceInput").val("");
            $("select.is-correct-answer").val("false");
            $("#modal-normal").modal('toggle');
            
            checkChoicesLength();
        }
        else{
            $("input.choice-input").parent().addClass("has-feedback has-error");
            $("input.choice-input").parent().find("span").html("The Choice field is required.").removeClass("hidden");
        }
    });


    $( "tbody.exam-table-body" ).sortable({
        delay: 100,
        stop: function() {
            reArrangeChoices();
        }
    });

    $('#modal-normal').on('show.bs.modal', function (e) {
        resetErrorValidation();
    });

    renderRemoveButton();
});


function renderRemoveButton(){
    $("button.remove-choice").on("click",function(){
        $(this).closest("tr").remove();
        checkChoicesLength();
        reArrangeChoices();
    });
}

function reArrangeChoices(){
    let rowCount = $("table.choices tbody.exam-table-body tr").length;
    for(var i = 0; i < rowCount;i++){
        var choiceNumberRow = 65+i;
        var letter = String.fromCharCode(choiceNumberRow);
        $("table.choices > tbody > tr:eq("+i+")").find("td:eq(0) input:text").val(letter);
        $("table.choices > tbody  > tr:eq("+i+")").find("td:eq(2) input:radio").val(letter);
    }
}

function resetErrorValidation(){
    $("input.choice-input").parent().removeClass("has-feedback has-error");
    $("input.choice-input").parent().find("span").addClass("hidden");
}

function isEmptyString(str) {
    return !str.trim().length;
}

function countChoices(){
    return $("table.choices tbody.exam-table-body tr").length;
}

function checkChoicesLength(){
    let rowCount = countChoices();
    console.log("rowCount: " , rowCount);
    if(rowCount >= 4){
        $("button.modal-normal").attr('disabled','disabled');
    }
    else{
        $("button.modal-normal").removeAttr('disabled');
    }
}