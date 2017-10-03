<form action="{{ route('statuses.store') }}" method="POST">
  @include('shared._errors')
  {{ csrf_field() }}
  <textarea class="form-control" rows="3" placeholder="聊聊新鲜事儿..." name="content">{{ old('content') }}</textarea>
  <button type="submit" class="btn btn-primary pull-right">发布</button>
</form>

{{-- 成功弹出提示窗口 --}}
@if(session('status'))
<div class="modal fade" id="myModal" role="dialog" tabindex="-1">
 <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
                <h4 class="modal-title">
                    添加成功！
                </h4>
            </div>
            <div class="modal-body">
                <p>
                    新的动态已经添加成功啦！赶紧看看吧
                </p>
            </div>
            <div class="modal-footer">
                
                <button aria-label="Close" class="btn btn-primary" data-dismiss="modal" type="button">
                    确定
                </button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
 $('#myModal').modal('show')
</script>

@endif