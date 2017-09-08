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
