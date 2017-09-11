<div class="row">
  <div class="col-md-12">
    <table class="table">
      <caption><strong>i18n</strong></caption>
      <tbody>
        <tr>
          <td class="col-md-4"><?= __x('weather', 'fine') ?></td>
          <td class="col-md-4"><?= __x('mood', 'fine') ?></td>
          <td><?= __('placeholder_msg', [5423.344, 5.1]) ?></td>
        </tr>
        <tr>
          <td class="col-md-4">
            <?= __d('colors', 'green') ?>|<?= __('animals', 'cat') ?>
          </td>
          <td>
            <?= __('{0,plural,=0{No records found} =1{Found 1 record} other{Found # records}}', [2]) ?>
          </td>
          <td>
            <?= __('{placeholder,plural,=0{No records found} =1{Found 1 record} other{Found {1} records}}', [0, 'many', 'placeholder' => 2]) ?>
          </td>
        </tr>
      </tbody>     
    </table>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <span><strong>MathComponent : <?= $mathComponent ?></strong></span>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <table class="table">
      <caption>Chronos</caption>
      <tbody>
        <tr>
          <td class="col-md-2">Now</td>
          <td><?= $now ?></td>
        </tr>
        <tr>
          <td>Time</td>
          <td><?= $time ?></td>
        </tr>
        <tr>
          <td>Time:Quarter</td>
          <td><?= $time->toQuarter() ?></td>
        </tr>
        <tr>
          <td>XML</td>
          <td><?= debug($xmlString) ?></td>
        </tr>
      </tbody>  
    </table>
  </div>
</div>
