@if ($message = session('status'))
    <div class="modal__text">
        <p>{{ $message }}</p>
    </div>
@endif
