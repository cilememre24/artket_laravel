<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/create_post.css') }}">
  </head>
  <body>

    <div class="modal fade" id="createImagePostModal" tabindex="-1" role="dialog" aria-labelledby="ImageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ImageModalLabel">Create Image Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <form id="regForm" action="{{ route('create_post', ['type' => 'image'])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="all-steps" id="all-steps"> <span class="step"><i class="fa fa-header"></i></span> <span class="step"><i class="fa fa-align-justify"></i></span> <span class="step"><i class="fa fa-picture-o"></i></span></div>
                <div class="tab">
                    <h6>Enter the title</h6>
                    <p> <input placeholder="Title..." oninput="this.className = ''" name="title"></p>
                </div>
                <div class="tab">
                    <h6>Enter the description</h6>
                    <p><input placeholder="Description..." oninput="this.className = ''" name="description"></p>
                </div>
                <div class="tab">
                    <h6>Select the image</h6>
                    <p><input type="file" name="fileToUpload" id="fileToUpload" oninput="this.className = ''"></p>
                </div>

                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;"> <button type="button" id="prevBtn" onclick="nextPrev(-1)"><i class="fa fa-arrow-left"></i></button> <button type="button" id="nextBtn" onclick="nextPrev(1)"><i class="fa fa-arrow-right"></i></button> </div>
                    <input style="margin-top:20px;" type="submit" value="Create" id="submit-post" name="create" class="btn btn-dark">
                </div>
            </form>
        </div>
    </div>

</div>
</div>

</div>


  </body>

</html>