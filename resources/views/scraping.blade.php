<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Scraping Calculator</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div
                    class="form-group col-md-2 col-md-offset-5 align-center mt-5"
                >
                    <input
                        type="text"
                        class="form-control"
                        id="angka"
                        placeholder="angka"
                    />
                    <input
                        type="text"
                        class="form-control mt-3"
                        id="jumlah"
                        placeholder="jumlah"
                    />
                    <button type="button" class="btn btn-primary mt-3" onclick="copyText()">
                        Copy <i class="fa-regular fa-copy"></i>
                    </button>
                </div>
            </div>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
            integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        <script>
            $(document).ready(function () {
                //this calculates values automatically
                calculateSum();

                $("#angka").on("keydown keyup", function () {
                    calculateSum();

                });
            });

            function calculateSum() {
                var sum = 0;
                //iterate through each textboxes and add the values
                $("#angka").each(function () {
                    //add only if the value is number
                    if (!isNaN(this.value) && this.value.length != 0) {
                        var sum1 = parseFloat(this.value) + 5000;
                        var sum2 = 0.2 * sum1;
                        var sum3 = sum1 + sum2;
                        sum = Math.round(sum3 / 100) * 100;
                        $(this).css("background-color", "#FEFFB0");
                    } else if (this.value.length != 0) {
                        $(this).css("background-color", "red");
                    }

                });

                $("#jumlah").val(sum.toFixed(0));
            }

            function copyToClipboard(text) {
                var sampleTextarea = document.createElement("textarea");
                document.body.appendChild(sampleTextarea);
                sampleTextarea.value = text; //save main text in it
                sampleTextarea.select(); //select textarea contenrs
                document.execCommand("copy");
                document.body.removeChild(sampleTextarea);
            }

            function copyText() {
                /* Select text area by id*/
                var valueText = $("#jumlah").val();
                copyToClipboard(valueText);
                $("#angka").select();
            }


        </script>
    </body>
</html>
