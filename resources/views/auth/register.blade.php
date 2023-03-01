<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <!-- Birthday -->
        <!--<div class="mt-4">-->
        <!--    <x-input-label for="birthday" :value="__('Birthday')" />-->
        <!--    <x-text-input id="birthday" class="block mt-1 w-full" type="text" name="birthday" :value="old('birthday')" required autocomplete="username" />-->
        <!--    <x-input-error :messages="$errors->get('birthday')" class="mt-2" />-->
        <!--</div>-->
        <!--追記-->
                <div class="mt-1 clearfix">
                    <div class="form-control-sm d-inline float-left">
                        <h6>年齢</h6>
                    </div>
                    @if ($errors->has('birthday'))
                        <div class="row justify-content-center">
                            <div class="cal-xs-4">
                                <span style="color:red">{{ $errors->first('birthday') }}</span>
                            </div>
                        </div>
                    @endif
                    @livewire('birthday')
                </div>
        
        <!-- Level -->
        <!--<div class="mt-4">-->
        <!--      <x-input-label for="language_level" :value="__('language_level')" />-->
        <!--      <x-input-label for="language_level" :value="__('language_level')" name="language_level" :value="old('language_level')" required autocomplete="username"/>-->
        <!--      <div class="mb-3 xl:w-96">-->
        <!--        <select data-te-select-init>-->
        <!--          <option value="1">level1:基礎的な挨拶やお礼を言うことができる</option>-->
        <!--          <option value="2">level2:自分の名前や住んでいる場所を簡単な言葉で紹介できる</option>-->
        <!--          <option value="3">level3:自分に関係することについて聞かれた時に簡単な内容なら答えられる</option>-->
        <!--          <option value="4">level4:食事をオーダーしたり電車やタクシーに乗れる</option>-->
        <!--          <option value="5">level5:好きな音楽・スポーツについて話せる。昨日あったことについて会話ができる</option>-->
        <!--          <option value="6">level6:興味のあることについて自分の意見を言ったり、相手の話を聞いたりして、長い会話ができる</option>-->
        <!--          <option value="7">level7:詳細な状況を説明したり、意見交換・交渉をすることができる</option>-->
        <!--          <option value="8">level8:議論・会議にて適切な言い方で自分の意見を言える。自信を持って議論に参加できる</option>-->
        <!--          <option value="9">level9:幅広い話題において自分の意見を明確かつ正確に表現することができる</option>-->
        <!--          <option value="10">level10:複雑かつ抽象的な話題であっても流暢に会話ができる</option>-->
        <!--        </select>-->
        <!--      </div>-->
        <!--</div>-->
        
        <!-- Time -->
        <!--<div class="mt-4">-->
        <!--      <x-input-label for="time" :value="__('Time')" />-->
        <!--      <x-input-label for="time" :value="__('Time')" name="Time" :value="old('Time')" required autocomplete="username"/>-->
        <!--      <div class="mb-3 xl:w-96">-->
        <!--        <select data-te-select-init>-->
        <!--          <option value="1">15分</option>-->
        <!--          <option value="2">30分</option>-->
        <!--          <option value="3">45分</option>-->
        <!--        </select>-->
        <!--      </div>-->
        <!--</div>-->

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<!-- 以下を追加 -->
@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </div>
@endif
