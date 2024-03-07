@extends('template')
@section('content')


    <div class="md:px-24 px-4">
        <div class="px-2 pt-2 pb-8 mt-5 mb-6 bg-gray-100 shadow-lg rounded-2xl md:px-16">
            <div class="mb-8">
                <div class="flex flex-col items-start justify-between md:flex-row">
                    <div class="flex m-2  flex-nowrap items-center ">
                        <img src="../profile.png" class="md:w-[60px] md:h-[60px] w-[40px] h-[40px] rounded-full border-4 md:m-2 m-1 border-gray-100" alt="">
                        <div class="ml-auto">
                            <h3 class="md:text-2xl text-lg md:m-2  font-bold" >{{$topic->users->name}}</h3>
                            <span class="md:text-sm text-2xs block md:m-2 "><span class="text-blue-600 font-bold">4 ساعت پیش</span> توسط <span class="text-blue-600 font-bold">{{$topic->users->name}}</span> مطرح شد</span>
                        </div>
                        <div class="flex items-center justify-left mr-auto text-left left-0">
                            <a href="#replies-list" class="flex items-center md:px-5 text-purple-600 px-2 md:py-1.5 py-0.5 rounded-lg bg-white md:mr-3 border border-opacity-0 border-white text-gray-450 group font-normal md:text-lg text-sm mr-auto justify-center transition duration-200 hover:text-gray-50 hover:bg-gray-700">
                                <img src="../icons8-reply-arrow-24.png" class="w-[20px] h-[20px]" alt="">
                                @php
                                    echo App\Models\Replay::where("topic_id" , $topic->id)->count();
                                @endphp
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center self-end justify-center w-full sm:self-center sm:justify-end sm:w-auto">
                        <div class="flex space-x-3 space-x-reverse">
                        </div>

                    </div>
                </div>
            </div>
            <div class="mb-6  text-right">
                <h1 class="mb-5 font-bold text-gray-800 dark:text-white md:text-4xl text-xl text-28 md:leading-68">
                    {{$topic->title}}
                </h1>
                <div class="px-8 py-2 text-gray-800 bg-gray-200 rounded-lg content-area dark:bg-dark-910">
                    <p>{{$topic->body}}</p>
                </div>
            </div>
            <hr class="mb-5 border-gray-300 border-opacity-20">
            <div class="flex flex-col items-center justify-between lg:flex-row">
                <div class="flex flex-col items-center justify-center mb-5 space-y-2 sm:space-x-2 sm:space-y-0 sm:space-x-reverse lg:mb-0 sm:flex-row ">
                </div>
            </div>


            @foreach($topic->replays as $replay)
                <div id="{{ $replay->id }}">
                    <div class="flex items-center px-4 md:mr-16 mr-6 pb-6 bg-white shadow-lg rounded-xl pt-9 mt-5">
                        <div class="w-full">
                            <div class="flex m-2  flex-nowrap items-center ">
                                <img src="../profile.png" class="md:w-[60px] md:h-[60px] w-[40px] h-[40px] rounded-full border-4 md:m-2 m-1 border-gray-100" alt="">
                                <div class="ml-auto">
                                    <h3 class="md:text-2xl text-lg md:m-2  font-bold" >{{$replay->creators->name}}</h3>
                                    <span class="md:text-sm text-2xs block md:m-2 "><span class="text-blue-600 font-bold">4 ساعت پیش</span> توسط <span class="text-blue-600 font-bold">کوروش</span> مطرح شد</span>
                                </div>
                                <div class="flex items-center justify-left mr-auto text-left left-0">
                                    <a href="#replies-list" class="flex items-center md:px-5 text-purple-600 px-2 md:py-1.5 py-0.5 rounded-lg bg-white md:mr-3 border border-opacity-0 border-white text-gray-450 group font-normal md:text-lg text-sm mr-auto justify-center transition duration-200 hover:text-gray-50 hover:bg-gray-700">
                                        <img src="../icons8-reply-arrow-24.png" class="w-[20px] h-[20px]" alt="">
                                        3
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="flex flex-col items-center">
                                    <div>
                                        <div class="flex flex-col items-center p-3 pt-5 pr-0 space-y-2 text-xl">
                                            <div onclick="AddLike({{ $replay->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="text-gray-300 cursor-pointer w-7 h-7 hover:text-blue-700 ">
                                                    <path fill="currentColor" d="M279 224H41c-21.4 0-32.1-25.9-17-41L143 64c9.4-9.4 24.6-9.4 33.9 0l119 119c15.2 15.1 4.5 41-16.9 41z" class=""></path>
                                                </svg>
                                            </div>
                                            <div class="text-xl font-semibold text-gray-500 ltr " id="data{{ $replay->id }}">
                                                @php
                                                    echo App\Models\ReplayLike::where('replay_id' , $replay->id)->count()-App\Models\Replaydislike::where('replay_id' ,$replay->id)->count()
                                                @endphp
                                            </div>
                                            <div onclick="AddDisLike({{ $replay->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="text-gray-300 cursor-pointer w-7 h-7 hover:text-blue-700 ">
                                                    <path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z" class=""></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex items-center">
                                        <div class="w-full text-gray-800 ">
                                            <p class="md:text-2xl text-lg">{{$replay->body}}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    @endforeach
                    <div>
                        <form action="{{route('topics.add.replay')}}" method="get" class="my-20">
                            @csrf


                            <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">

                                    <textarea id="comment " name="comment" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="نظر من اینه که ..." required ></textarea>
                                </div>
                                <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                                    <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                        ارسال کامنت
                                    </button>
                                    <input type="hidden" name="hidden" id="" value="{{$topic->id}}">
                                    <div class="flex ps-0 space-x-1 rtl:space-x-reverse sm:ps-2">
                                        <button type="button" class="inline-flex justify-center items-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 20">
                                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M1 6v8a5 5 0 1 0 10 0V4.5a3.5 3.5 0 1 0-7 0V13a2 2 0 0 0 4 0V6"/>
                                            </svg>
                                            <span class="sr-only">Attach file</span>
                                        </button>
                                        <button type="button" class="inline-flex justify-center items-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                                <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                                            </svg>
                                            <span class="sr-only">Set location</span>
                                        </button>
                                        <button type="button" class="inline-flex justify-center items-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                <path d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"/>
                                            </svg>
                                            <span class="sr-only">Upload image</span>
                                        </button>
                                    </div>
                                </div>
                            </div>



                        </form>
                    </div>
                </div> </div></div></div>

<script>
    const token = "{{ csrf_token() }}";

    const AddLike = (replayID) => {
        const requestBody = {
            "replayID": replayID,
            "_token": token
        }
        fetch("{{ route('topics.addreplaylike.submit') }}", {
            method:"POST",
            headers: {
                'X-CSRF-TOKEN': token,
                'Content-Type': "application/json,charset-utf8"
            },
            body: JSON.stringify(requestBody)
        })
            .then(response => response.json())
            .then(data => {
                console.log(data)
                document.getElementById('data'+replayID).innerText = data.data
            })
            .catch(err => console.log(err))
    };

    function AddDisLike(replayID) {
        const requestBody = {
            "replayID": replayID,
            "_token": token
        }
        fetch("{{ route('topics.addReplayDisLike.submit') }}", {
            method:"POST",
            headers: {
                'X-CSRF-TOKEN': token,
                'Content-Type': "application/json,charset-utf8"
            },
            body: JSON.stringify(requestBody)
        })
            .then(response => response.json())
            .then(data => {
                console.log(data)
                document.getElementById('data'+replayID).innerText = data.data
            })
            .catch(err => console.log(err));
    }
</script>

@endsection
