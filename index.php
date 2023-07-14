<?php include("db.php");?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="foliocompra" class="form-control" placeholder="folio de compra" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="descripcion" class="form-control" placeholder="decripcion" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="precio" class="form-control" placeholder="precio" autofocus>
          </div> 
          <div class="form-group">
          </div> 
          
          <div class="form-group">
            <textarea name="cantidad" rows="2" class="form-control" placeholder="cantidad"></textarea>
          </div>
          <div class="form-group">
          </div>
          <div class="form-group">
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>folio_compra</th>
            <th>Descripcion_producto</th>
            <th>precio</th>
             <th> cantidad</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM compras";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['folio_compra']; ?></td>
            <td><?php echo $row['descripcion_producto']; ?></td>
            <td><?php echo $row['precio']; ?></td>
            <td><?php echo $row['cantidad']; ?></td>
            <td>
              <a href="edit.php?folio_compra=<?php echo $row['folio_compra']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?folio_compra=<?php echo $row['folio_compra']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>