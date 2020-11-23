{{ Form::open(['action'=>'App\Http\Controllers\frontend\FC_messageController@store', 'method'=>'POST']) }}
<input type="hidden" name="id_renters" value="{{$id_renters}}" />
    <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
        <div class="small-dialog-header">
            <h3>Send Message</h3>
        </div>
        <div class="message-reply margin-top-0">
            <textarea cols="40" rows="3" name="message" placeholder="Your Message to Kathy"></textarea>
            {{Form::submit('Send',['class'=>'button','name' => 'action'])}}
        </div>
    </div>
{{ Form::close() }}
