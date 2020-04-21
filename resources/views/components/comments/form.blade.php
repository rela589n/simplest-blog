<form action="{{ $sendAction }}" method="post" id="add-comment-form">
    @method($sendMethod)
    @csrf

    <div class="form_row">
        <label for="author_name">Name</label><br/>
        <input type="text" id="author_name" name="author_name" required/>
        <div class="errors"></div>
    </div>

    <div class="form_row">
        <label for="content">Comment</label><br/>
        <textarea id="content" name="content" required></textarea>
        <div class="errors"></div>
    </div>

    <div class="errors"></div>

    <input type="hidden" name="commentable_type" value="{{ $commentableType }}">
    <input type="hidden" name="commentable_id" value="{{ $commentableId }}">

    <input type="submit" name="Submit" value="Submit" class="submit_btn"/>
</form>
