<div class="row">
  <div class="col d-flex justify-content-between align-items-center">
    <h2>File: <?php echo $file->name; ?></h2>
    <a href="/filemanager/show/<?php echo $folder_slug; ?>" class="btn btn-secondary">
      <i class="fas fa-reply"></i> Back
    </a>
  </div>
</div>

<div class="row">
  <div class="col border">
    <pre><?php echo $file->content; ?></pre>
  </div>
</div>
