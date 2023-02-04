<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿の個別表示
        </h2>

        <x-message :message="session('message')" />

    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <div class="px-10 mt-4">

                <div class="bg-white w-full  rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                    <div class="mt-4">
                        <h1 class="text-lg text-gray-700 font-semibold">
                            {{$post->title}}
                        </h1>
                        <hr class="w-full">
                    </div>
                    <div class="flex justify-end mt-4">
                        <a href="{{route('post.edit', $post)}}"><x-primary-button class="btnsetb">編集</x-primary-button></a>
                        <form method="post" action="{{route('post.destroy', $post)}}">
                            @csrf
                            @method('delete')
                            <x-primary-button class="btnsetr" onClick="return confirm('本当に削除しますか？');">削除</x-primary-button>
                        </form>
                    </div>
                    <!-- div追加部分 -->
                    <div>
                        <p class="mt-4 text-gray-600 py-4">{{$post->content}}</p>
                        @if($post->file)
                            <div> 
                                <a href="{{ asset('storage/files/'.$post->file)}}" >{{$post->file}}</a>
                            </div>
                        @endif
                        <div class="text-sm font-semibold flex flex-row-reverse">
                            <p> {{ $post->user->name }} • {{$post->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                    <!-- div追加部分 -->
                    <div class="mt-4 mb-12">
                        <form method="post" action="{{route('comment.store')}}">
                            @csrf
                            <input type="hidden" name='post_id' value="{{$post->id}}">
                            <textarea name="content" class="bg-white w-full  rounded-2xl px-4 mt-4 py-4 shadow-lg hover:shadow-2xl transition duration-500" id="content" cols="30" rows="3" placeholder="コメントを入力してください">{{old('content')}}</textarea>
                            <x-primary-button class="btnstpe2">コメントする</x-primary-button>
                        </form>
                    </div>
                    <!-- 追加部分終わり -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>