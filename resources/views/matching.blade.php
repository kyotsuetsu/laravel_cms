<!-- matching.blade.php -->
<x-app-layout>
   
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-500 font-bold">
            マッチング結果
        </div>
    </div>
    <ul>
        @foreach ($users as $user)
            <li>名前：{{ $user->name }}</li>
            <li>言語レベル：{{ $user->language_level }}</li>
            <x-button class="bg-blue-500 rounded-lg">トーク申請する</x-button>
        @endforeach
    </ul>
    
</x-app-layout>
