<?php
include "databas.php";
$sql = "SELECT * FROM annonce ";
$result = $conn->query($sql);


$data = $result->fetch_all(MYSQLI_ASSOC);

// echo "<pre>";
// print_r($data);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion des annonces d'une agence immobilière</title>
    <!--======================== Link bootsrap ======================================-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <!--======================== link css ======================================-->
    <link rel="stylesheet" href="style.css" />
    <!--======================== link Librarry font Awesom ======================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <nav class="navbar navbar-light bg-light w-100 position-fixed">
      <div class="container-fluid">
        <img
          src="images/Logo.png"
          alt=""
          width="160"
          height="130"
          class="d-inline-block align-text-top"
        />
        <div>
          <a class="navbar-brand" href="#">Home</a>
          <a class="navbar-brand" href="#">About</a>
          <a class="navbar-brand" href="#">Contact</a>
        </div>
      </div>
    </nav>
    <main class="">
      <section class="section-one">
        <div id="btn-serch" class="w-75">
          <form action="" class="w-100 d-flex justify-content-center">
            <label for="" class="d-flex">
              type: 
               <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="">For Rent</option>
                <option value="">For Sale</option>
              </select>
            </label>
            <label for="" class="d-flex" id="max-price">
              Max Price: 
              <input type="number" min="0">
            </label>
            <label for="" class="d-flex" id="min-Price">
              Min Price: 
              <input type="number" min="0">
            </label>
            <button type="submit" class="btn btn-primary ml-4">Submit</button>
          </form>
        </div>

      <!--========================================   ===========================================-->
        <button type="button" class="btn btn-primary" id="btn-add" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">add announce</button>
                <!--======================================== modal add  ===========================================-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
    </section>
      <section class="container mt-5">

    <!-- lop in data for show card -->
    <div class="d-flex mb-4 justify-content-around flex-wrap-wrap">
        <?php
        foreach ($data as $key => $value) {
            // delet card function ===================
          $id = $_GET['id'];
       $if (isset($_GET['id'])){
    // echo($_GET['id']);
    $delete = mysqli_query($conn,"DELETE FROM `hamd` WHERE `id`='$id'");
}

        ?>
              <div class="card ml-3" width="calc(100%/3)">
                <img
                  src="images/4.jpg"
                  class="card-img-top"
                  alt="..."
                  height="300px"
                />
                <div class="card-body">
                  <h5 class="card-title"><?php echo $value["title"] ?></h5>
                  <p class="card-text">
                    <?php echo $value["discription"]; ?>
                  </p>
                  <h3>Price: <span><?php echo $value["price"] ?>$</span></h3>
                  <div class="d-flex gap-5 justify-content-around">
                    <button
                      name = "dlName"
                      type="button"
                      class="btn btn-danger"
                      data-toggle="modal"
                      data-target="#exampleModal"
                    >
                      Delete
                    </button>
                    <a
                    href = "red.php?<?php $value["id"]; ?>"
                    name = "id"
                      type="button"
                      class="btn btn-primary"
                      data-toggle="modal"
                      data-target="#exampleModal"
                    >
                      Edit
                   </a>
                  </div>
                </div>
              </div>

        <?php
        }
        ?>
    </div>
        <!-- Modal -->
        <div
          class="modal fade"
          id="exampleModal"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">...</div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Close
                </button>
                <button type="button" class="btn btn-primary">
                  Save changes
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!--========================  Footer ======================================-->
<footer class="text-center text-lg-start text-muted bg-light">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>social networks:</span>
    </div>
    <div>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-github"></i>
      </a>
    </div>
  </section>
  <section class="">
    <div class="container text-center text-md-start mt-5">
  </section>
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
</footer>

    <!-- link js bootsrap -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <!-- link java script -->
    <script src="script.js"></script>
  </body>
</html>

