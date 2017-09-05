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
          <td>Today</td>
          <td><?= $today ?></td>
        </tr>
        <tr>
          <td>Tomorrow</td>
          <td><?= $tomorrow ?></td>
        </tr>
        <tr>
          <td>Date</td>
          <td><?= $date ?></td>
        </tr>
        <tr>
          <td>Time</td>
          <td><?= $time ?></td>
        </tr>
        <tr>
          <td>Time:startOfDay</td>
          <td><?= $time->startOfDay() ?></td>
        </tr>
        <tr>
          <td>Time:startOfWeek</td>
          <td><?= $time->startOfWeek() ?></td>
        </tr>
      </tbody>  
    </table>
  </div>
</div>
