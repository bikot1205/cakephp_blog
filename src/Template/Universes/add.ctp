<?php
/**
  * @var \App\View\AppView $this
  */
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><?= $this->Html->link(__('List Universes'), ['action' => 'index']) ?></li>
    <li class="breadcrumb-item active">New</li>
</ol>

<div class="row">
  <div class="col-md-12">
    <form role="form" method="post" action="/universes/add">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" />
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea placeholder="複数行に渡るテキストを入力できる。" rows="3" class="form-control" id="description" name="description"></textarea>
      </div>
      <div class="form-group">
        <label for="characteristics">Characteristics</label>
        <select class="form-control" id="characteristics" name="characteristics">
          <option value=""></option>
          <?php foreach ($config_characteristics as $key => $value) { ?>
          <option value="<?php echo $key?>"><?php echo $value?></option>
          <?php } ?>         
        </select>
      </div>
      <div class="form-group">
        <label class="control-label" for="birthday">
          Birthday
        </label>
        <input type="text" id="birthday" name="birthday" class="form-control datepicker" value="">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>    
  </div>
</div>
<script type="text/javascript">
  $(function () {
    $(".datepicker").datetimepicker({
      locale: 'ja',
      format: 'YYYY-MM-DD',
      showClear:false
    });
  });
</script>
