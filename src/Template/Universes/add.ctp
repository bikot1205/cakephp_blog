<?php
/**
  * @var \App\View\AppView $this
  */
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><?= $this->Html->link(__('List Universes'), ['action' => 'index']) ?></li>
    <li class="breadcrumb-item active">New</li>
</ol>

<?php

$this->Breadcrumbs->templates([
    'item' => '<li{{attrs}}>{{icon}}<a href="{{url}}"{{innerAttrs}}>{{title}}</a></li>{{separator}}'
]);

$this->Breadcrumbs->add(
    __('List Universes'),
    ['controller' => 'universes', 'action' => 'index'],
    [
        'templateVars' => [
            'icon' => '<span class="glyphicon glyphicon-music" aria-hidden="true"></span>'
        ]
    ]
);

$crumbs = $this->Breadcrumbs->getCrumbs();
$crumbs = collection($crumbs)->map(function ($crumb) {
    $crumb['options']['class'] = 'breadcrumb-item';
    return $crumb;
})->toArray();

$this->Breadcrumbs->reset()->add($crumbs);

echo $this->Breadcrumbs->render(
    ['class' => 'breadcrumbs-trail'],
    ['separator' => '<i class="fa fa-angle-right"></i>']
);

///////////////////////////////
echo $this->Html->getCrumbs(' > ', 'Home');
$this->Html->addCrumb('Universes', '/universes');
$this->Html->addCrumb('Add Universe', ['controller' => 'Universes', 'action' => 'add']);
//echo $this->Html->getCrumbList();
echo $this->Html->getCrumbList(
    [
        'firstClass' => false,
        'lastClass' => 'active',
        'class' => 'breadcrumb'
    ],
    'Home'
);

?>

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
        <label for="weight">Weight</label>
        <input type="text" class="form-control" id="weight" name="weight" />
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
