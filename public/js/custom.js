// $(document).ready(() => {

//     // Show and hide checkBoxes

//     let clickTime = 0;
//     $("#addNewCheckboxes").click(() => {
//         clickTime++;
//         var getCheckValue = $("#timeId").val();
//         if (clickTime == 1) {
//             $(".each-time").prepend(`
//                     <input type="checkbox" name="eacheTime" id="eachTime" value=`+ getCheckValue + ` class="input-controler"/>
//                 `);

//         } else {
//             return;
//         }
//     });

//     $("#timing-form").on('submit', function (e) {

//         //put checked input into array one by one
//         var someCheckBoxes = [];

//         if ($("#timeId").val() != '') {
//             $("input:checkbox[name=billToEmail]:checked").each(function () {
//                 someCheckBoxes.push($(this).val());
//             });
//         }
//         someCheckBoxes = json.stringify(someCheckBoxes);
//         console.log(someCheckBoxes)

//         // Send all checked data to controller
//         var dayName = $("#dayName").val();
//         var dataString = "pshychologist_id=10 &day=" + dayName + " &times" + someCheckBoxes;
//         $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
//         $.ajax({
//             url: "/psycho_info",
//             type: 'post',
//             data: {
//                 someCheckBoxes
//             },
//             success: function (response) {
//                 console.log(response);

//             }
//         });

//     });




// });
