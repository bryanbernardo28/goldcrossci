$(document).ready(function(){
    $("button.modal-normal").click(function(){
        let hasRadioChecked = $("table.choices > tbody  > tr").find("td:eq(2) input:radio").is(":checked");
        if(hasRadioChecked){
            $("select.is-correct-answer").attr('disabled','disabled');
        }
        $("#modal-normal").modal('toggle');
    });


    $("button.save-choice").click(function(){
        let choiceText = $("#choiceInput").val();
        let correctSelect = $("#correctSelect").val();

        let rowCount = $("table.choices tr").length;
        var tableData = "<tr><td>";
        
        var choiceNumberRow = rowCount++;

        tableData += choiceNumberRow+"</td>";
        tableData += "<td>"+choiceText+"</td>";

        var isCorrectAnswer = correctSelect === 'true' ? "checked" :"";
        var isCorrectRadioButton = '<label class="radio-inline">'+
                                    '<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"'+isCorrectAnswer+'> Correct Answer'+
                                    '</label>';

        tableData += "<td>"+isCorrectRadioButton+"</td>";
        tableData += "</tr>";


        $("tbody.exam-table-body").append(tableData);
        $("#choiceInput").val("");
        $("select.is-correct-answer").val("false");
        $("#modal-normal").modal('toggle');

    });
});