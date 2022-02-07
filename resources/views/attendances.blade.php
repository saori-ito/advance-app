<x-app-layout>
    <body>
    <header class="header flex__item">
        <a class="header__nav-list-link header-title">Atte</a>
        <nav class="header__nav">
            <ul class="header__nav-list flex__item">
                <li>
                    <a href="/" class="header__nav-list-link">ホーム</a>
                </li>
                <li>
                    <a href="/attendance" class="header__nav-list-link">日付一覧</a>
                </li>
                <li>
                    <a href="/user" class="header__nav-list-link">ユーザーページ</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" name='$name' value='$name'>
                        @csrf
                        <button type="submit" class="header__nav-list-link1">ログアウト</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <div class="service3">
        <p class="service-title">勤怠表一覧</p>
        <div class="service_png-position2">
            <div class="service_png-position2div">
                <div class="form-item">
                    <table class="form-item1">
                        <thead>
                        <tr>
                            <th>日付</th>
                            <th class="form-item3">名前</th>
                            <th>勤務開始</th>
                            <th>勤務終了</th>
                            <th>勤務時間</th>
                            <th>休憩開始</th>
                            <th>休憩終了</th>
                            <th>休憩時間</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($times as $time)
                            <tr>
                                <td>{{ $time->date }}</td>
                                <td>{{ $time->user->name }}</td>
                                <td>{{ $time->punch_in }}</td>
                                <td>{{ $time->punch_out }}</td>
                                <td>{{ $time->working_hour }}</td>
                                @foreach ($time->rests as $rest)
                                    <td>{{ $rest->break_start }}</td>
                                    <td>{{ $rest->break_end }}</td>
                                    <td>{{ $rest->break_hour }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $times->appends(request()->query())->links()}}
            </div>
        </div>
    </div>
    <p class="service-title2">Atte,inc.</p>
    </body>
</x-app-layout>
