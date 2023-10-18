<button type="button" class="btn btn-lg btn-block w-100 text-white btn-primary" data-toggle="modal" data-target="#entryModal">応募する</button>
    
<div class="modal fade" id="entryModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4><div class="modal-title" id="myModalLabel">応募確認画面</div></h4>
            </div>

            <form action="{{ route('entry.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- IF(応募済みじゃない時) -->
                    <!-- <label>応募済みです</label> -->
                    <!-- セレクトボックスの値次第で、応募済みか否かを表示する -->

                    <label>{{ $company->company_name }}<br>下記の職種に応募しますか？</label>
                    <br>
                    <select name="job_id" class="w-50">
                        @foreach ($jobs as $job)
                            <option value="{{ $job->id }}">{{ $job->job_title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button> -->
                    <!-- IF(応募済みじゃない時) -->
                    <button type="submit" class="btn btn-success">応募</button>
                    <!-- ELSE(既に応募済みの場合) -->
                </div>
                <input type="hidden" name="company_id" value="{{ $company->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            </form>

        </div>
    </div>
</div>