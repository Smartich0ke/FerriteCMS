<div class="comment">

    <div class="pt-3">
        <div class="d-flex flex-row gap-3">
            <img src="{{ gravatarProfileImage($comment->email, 64) }}" height="64" width="64" alt="" class="rounded-2 border">
            <div class="d-flex flex-column justify-content-start align-items-start w-100">
                <div class="d-flex flex-row align-items-center gap-2">
                    <strong class="">{{ $comment->author }}</strong>
                    <div style="font-size: 0.85rem" class="text-muted">{{ formatShortDate($comment->created_at) }}</div>
                </div>
                <div>
                    {{ $comment->text }}
                </div>
                <post-reply :initial-like-status='@if($comment->hasBeenLikedByClient() ) true @else false @endif ' :initial-likes-count='{{ $comment->likes()->count() }}' commentid="{{ $comment->id }}" postid="{{ $post->id }}" parentid="{{ $comment->id }}" csrf="{{ csrf_token() }}"></post-reply>
                @if($comment->replies)
                    <view-replies>
                        @foreach($comment->replies as $reply)
                            @include('comments.comments', ['comment' => $reply])
                        @endforeach
                    </view-replies>
                @endif
            </div>
        </div>
    </div>

</div>
