<div class="row">
  <div class="col-md-12">
    <table class="table table-striped">
      <caption><strong>Helper</strong><small>($this->Text->)</small></caption>
      <tbody>
        <tr>
          <td class="col-md-2">autoLinkEmails</td>
          <td class="col-md-10">
            <?php 
              $myText = 'For more information regarding our world-famous ' .
                        'pastries and desserts, contact info@example.com';
              $linkedText = $this->Text->autoLinkEmails($myText);
              echo $linkedText;
            ?>
          </td>
        </tr>
        <tr>
          <td>autoLinkUrls</td>
          <td>
            <?php 
              $myText = 'Welcome http://www.epochtimes.jp';
              $linkedText = $this->Text->autoLinkUrls($myText);
              echo $linkedText;
            ?>
          </td>
        </tr>
        <tr>
          <td>autoLink</td>
          <td>
            <?php 
              $myText = 'Welcome http://www.epochtimes.jp Contact info@epochtimes.jp';
              $linkedText = $this->Text->autoLink($myText);
              echo $linkedText;
            ?>
          </td>
        </tr>
        <tr>
          <td>autoParagraph</td>
          <td>
            <?php 
              $myText = 'For more information
              regarding our world-famous pastries and desserts.

              contact info@example.com';
              $formattedText = $this->Text->autoParagraph($myText);
              echo $formattedText;
            ?>
          </td>
        </tr>
        <tr>
          <td>highlight</td>
          <td>
            <?php 
              $lastSentence = 'デフォルトの文字列を使って $haystack 中の $needle をハイライトします。';
              $formattedText = $this->Text->highlight(
                $lastSentence,
                '使って',
                ['format' => '<span style="color:red">\1</span>']
              );
              echo $formattedText;
            ?>
          </td>
        </tr>
        <tr>
          <td>truncate</td>
          <td>
            <?php 
              $lastSentence = 'For more information';
              $formattedText = $this->Text->truncate(
                $lastSentence, 5);
              echo $formattedText;
            ?>
          </td>
        </tr>
        <tr>
          <td>tail</td>
          <td>
            <?php 
              $lastSentence = 'For more information';
              $formattedText = $this->Text->tail(
                $lastSentence, 8);
              echo $formattedText;
            ?>
          </td>
        </tr>
        <tr>
          <td>excerpt</td>
          <td>
            <?php 
              $lastParagraph = 'For more information';
              $formattedText = $this->Text->excerpt($lastParagraph, 'more', 5, '...');
              echo $formattedText;
            ?>
          </td>
        </tr>
        <tr>
          <td>toList</td>
          <td>
            <?php 
              $colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
              echo $this->Text->toList($colors);
            ?>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>        

<div class="row">
  <div class="col-md-12">
    <table class="table table-striped">
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
    <table class="table table-striped">
      <caption><strong>Session</strong></caption>
      <tbody>
        <tr>
          <td class="col-md-6"><?= $this->request->session()->read('Config.theme') ?></td>
          <td class="col-md-6"><?= $this->request->session()->read('Config.language') ?></td>
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
    <table class="table table-striped">
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
