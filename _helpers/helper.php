<?php
function base_url($a=''){
    $getbase_url=$GLOBALS['setUri']['base'];
    return $getbase_url.$a;
}

function assets($a=''){
    $getbase_assets=$GLOBALS['setUri']['assets'];
    return base_url($getbase_assets.$a);
}

function url($a='',$b=''){
    return base_url($b.'?halaman='.$a);
}

function templates($a=''){
    return assets($GLOBALS['template'].$a);
}

function content_open($cardName = ''){
    return '
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">'.$cardName.'</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>';
}

function content_close($cardFooter = ''){
    return '        
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->';
}