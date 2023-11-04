<button type="button" class="btn btn-lg btn-block w-100 text-white btn-primary" data-toggle="modal" data-target="#entryModal">応募する</button>
    
<div class="modal fade" id="entryModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4><div class="modal-title" id="myModalLabel">応募確認画面</div></h4>
            </div>

            <form method="POST" action="{{ route('entry.storeEntry') }}">
                @csrf
                <div class="modal-body">
                    <label>{{ $company->company_name }}<br>下記の職種に応募しますか？</label>
                    <br>
                    <h3>{{ $job->job_title }}</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                    <button type="submit" class="btn btn-success">応募</button>
                </div>
                <input type="hidden" name="company_id" value="{{ $company->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="job_id" value="{{ $job->id }}">
            </form>
        </div>
    </div>
</div>