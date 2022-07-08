@php
    $title_id = uniqid("modal-title-")
@endphp

<div class="modal {{
        useModifiers('modal', [
            'wide'=>$wide??false,
            'loginModal'=>$loginModal??false,
            ])
        }}" {{$attributes->except(['title', 'text'])}} data-modal
     @if ($isHidden ?? true)
        aria-hidden="true" hidden
     @endif
     aria-labelledby="{{$title_id}}">
    <div class="modal__curtain" data-a11y-dialog-hide></div>
    <div class="modal__wrapper">
        <div class="modal__body" role="document">
            <div class="modal__content">
                <button
                    data-a11y-dialog-hide
                    class="modal__close"
                    aria-label="Close this dialog window"
                >
                    <x-icons.close/>
                </button>
                <div class="modal__header">
                    {{ $header ?? '' }}
                </div>
                {{$slot}}
            </div>
        </div>
    </div>
</div>
