

    <x-app-layout>
        <div class="min-h-screen bg-gray-200 py-8">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Form Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                    <!-- Header -->
                    <div class="border-b border-gray-100 px-8 py-6 bg-emerald-200 rounded-t-xl">
                        <h1 class="text-2xl font-semibold text-gray-900">新規投稿</h1>
                    </div>

                    <form action="{{ route('jobpost.store') }}" method="POST" class="p-8 space-y-6">
                        @csrf

                        <!-- Basic Information Section -->
                        <div class="space-y-6">
                            <h2 class="text-lg font-mono text-gray-900">基本情報</h2>

                            <!-- New -->



                         {{-- <div class="space-y-2">
                                <label for="title" class="block text-sm font-mono text-gray-700">
                                    役職
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="title" id="title"
                                    class="w-full rounded-md border border-gray-400"
                                    placeholder="役職名を入力してください" required>
                            </div> --}}

                            <div class="space-y-2">
                                <label for="title" class="block text-sm font-mono text-gray-700">
                                    投稿タイトル
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="title" id="title"
                                    class="w-full rounded-md border border-gray-400"
                                    placeholder="投稿タイトルを入力してください" required>
                            </div>


                            <div class="space-y-2">
                                <label for="company_name" class="block text-sm font-mono text-gray-700">
                                    会社名
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="company_name" id="company_name"
                                    class="w-full rounded-md border border-gray-400"
                                    placeholder="会社名を入力してください" required>
                            </div>


                            <div class="space-y-2">
                                <label for="title" class="block text-sm font-mono text-gray-700">
                                    会社名（フリガナ）
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="company_furigana" id="company_furigana"
                                    class="w-full rounded-md border border-gray-400"
                                    placeholder="フリガナを入力してください" required>
                            </div>



                            <div class="space-y-2">
                                <label for="company_address" class="block text-sm font-mono text-gray-700">
                                    所在地
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="company_address" id="company_address"
                                    class="w-full rounded-md border border-gray-400"
                                    placeholder="所在地を入力" required>
                            </div>



                            <div class="space-y-2">
                                <label for="homepage_url" class="block text-sm font-mono text-gray-700">
                                    ホームページURL
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="url" name="homepage_url" id="homepage_url"
                                    class="w-full rounded-md border border-gray-400"
                                    placeholder="URLを入力" required>
                            </div>



                                <div class="mb-4">
                                    <label for="category_id" class="block text-sm font-medium text-gray-700">業種</label>
                                    <select id="category_id" name="category_id"
                                            class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        <option value="">業種選択</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="category2_id" class="block text-sm font-medium text-gray-700">職種</label>
                                    <select id="category2_id" name="category2_id"
                                            class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        <option value="">職種選択</option>
                                    </select>
                                </div>



                        <!-- Job Details -->
                        <div class="space-y-2">
                            <label for="job_detail" class="block text-sm font-medium text-gray-700">
                                仕事内容
                                <span class="text-red-500">*</span>
                            </label>
                            <textarea name="job_detail" id="job_detail" rows="6"
                                class="w-full rounded-md border border-gray-400"
                                placeholder="仕事内容を入力してください。" required></textarea>
                        </div>


                        <div class="space-y-2">
                            <label for="type" class="block text-sm font-mono text-gray-700">
                               雇用形態
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="type" id="type"
                                class="w-full rounded-md border border-gray-400"
                                placeholder="を入力"
                                value="正社員"
                                onfocus="this.select()"
                                readonly
                                >
                        </div>

                        <!--data bgaa-->

                        <div class="space-y-2">
                            <label for="working_location" class="block text-sm font-mono text-gray-700">
                                就業場所
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="working_location" id="working_location"
                                class="w-full rounded-md border border-gray-400"
                                placeholder="就業場所を入力" required>
                        </div>

                        <div class="space-y-2">
                            <label for="my_car" class="block text-sm font-mono text-gray-700">
                                マイカー通勤
                                <span class="text-red-500">*</span>
                            </label>
                            <select name="my_car" id="my_car" class="w-full rounded-md border border-gray-400">
                                <option value="">選択</option>
                                <option value="可">可</option>
                                <option value="不可">不可</option>
                            </select>
                        </div>

                        <!-- data ni baigaa -->
                        <div class="space-y-2">
                            <label for="qualification" class="block text-sm font-medium text-gray-700">
                                必要な経験・スキル・資格
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="qualification" id="qualification"
                                class="w-full rounded-md border border-gray-400"
                                placeholder="資格を入力してください" required>
                         </div>


                        <div class="space-y-2">
                        <label for="trial_period" class="block text-sm font-medium text-gray-700">
                           試用期間
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="trial_period" id="trial_period"
                            class="w-full rounded-md border border-gray-400"
                            placeholder="試用期間を入力してください" required>
                    </div>


                          <!-- data ni baigaa -->
                    <div class="space-y-2">
                        <label for="salary" class="block text-sm font-mono text-gray-700">
                            給料
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="salary" id="salary"
                            class="w-full rounded-md border border-gray-400"
                            placeholder="給料を入力してください" required>
                    </div>





                            <!-- 賃金締切日 -->
                    <div class="flex flex-col lg:flex-row lg:justify-between gap-4">
                        <!-- 賃金締切日 -->
                        <div class="flex-1">
                            <label for="salary_deadline" class="block text-sm font-mono text-gray-700">
                                賃金締切日
                                <span class="text-red-500">*</span>
                            </label>
                            <select name="salary_deadline" id="salary_deadline" class="mt-1 block w-full rounded-md border border-gray-400 shadow-sm " required>
                                <option value="" class="">締切日選択</option>
                                @for ($i = 1; $i <= 31; $i++)
                                    <option class="" value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <!-- 賃金支払い日 -->
                        <div class="flex-1">
                            <label for="salary_payment_month" class="block text-sm font-mono text-gray-700">
                                賃金支払い日
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="flex gap-2 mt-1">
                                <!-- Month Selector -->
                                <select name="salary_payment_month" id="salary_payment_month" class="w-1/3 mt-1 block rounded-md border border-gray-400 shadow-sm " required>
                                    <option value="">選択してください。</option>
                                    <option value="当月">当月</option>
                                    <option value="翌月">翌月</option>
                                </select>
                                <!-- Day Selector -->
                                <select name="salary_payment_day" id="salary_payment_day" class="w-2/3 mt-1 block rounded-md border border-gray-400 shadow-sm " required>
                                    <option value="" class="">支払い日選択してください。</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option class="" value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>



                   <div class="space-y-2">
                        <label for="working_hour" class="block text-sm font-mono text-gray-700">
                          労働時間
                            <span class="text-red-500">*</span>
                        </label>
                        <!-- Radio Buttons -->
                        <div class="flex items-center space-x-4">

                            <label class="flex items-center space-x-2">
                                <input

                                type="radio"
                                name="working_hour"
                                id="working_hour"
                                value="固定"
                                class="rounded border-gray-400"
                                onclick="toggleWorkingHours('fixed')">

                                <span>固定</span>
                            </label>

                            <label class="flex items-center space-x-2">

                                <input
                                    type="radio"
                                    name="working_hour"
                                    id="working_hour"
                                    value="シフト制"
                                    class="rounded border-gray-400"
                                    onclick="toggleWorkingHours('shift')">

                                <span>シフト制</span>
                            </label>
                        </div>


                        <!-- Conditional Inputs for "Yes" -->
                        <div id="fixed_hours_input" class="hidden space-y-2 justify-normal">
                            <div class="flex items-center space-x-2">

                                <input type="text"
                                        id="working_hour_a"
                                        name="working_hour_a"
                                        class="rounded-md border border-gray-400 p-2 w-full"
                                        placeholder="例: 9:00～18:00">
                            </div>
                        </div>

                           <!-- Shift Hours Inputs (シフト制) -->
                         <div id="shift_hours_inputs" class="hidden space-y-4">
                            <div class="space-y-2">
                                <label class="block text-sm text-gray-700">シフト1</label>

                                <input type="text"
                                       id="working_hour_b_1"
                                       name="working_hour_b_1"
                                       class="rounded-md border border-gray-400 p-2 w-full"
                                       placeholder="例: 早番 8:00～16:00">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm text-gray-700">シフト2</label>

                                <input type="text"
                                       id="working_hour_b_2"
                                       name="working_hour_b_2"
                                       class="rounded-md border border-gray-400 p-2 w-full"
                                       placeholder="例: 日勤 11:00～19:00">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm text-gray-700">シフト3</label>

                                <input type="text"
                                       id="working_hour_b_3"
                                       name="working_hour_b_3"
                                       class="rounded-md border border-gray-400 p-2 w-full"
                                       placeholder="例: 遅番 16:00～24:00">
                            </div>

                        </div>
                    </div>




                    {{-- <div class="space-y-2">
                        <label for="overtime" class="block text-sm font-mono text-gray-700">
                            時間外手当
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="overtime" id="overtime"
                            class="w-full rounded-md border border-gray-400"
                            placeholder="時間外手当を入力してください" required>
                    </div> --}}

                    {{-- <div class="space-y-2">
                        <label for="other_allowance" class="block text-sm font-mono text-gray-700">
                            その他手当
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="other_allowance" id="other_allowance"
                            class="w-full rounded-md border border-gray-400"
                            placeholder="通勤手当・住宅手当など" required>
                    </div> --}}


                    {{-- <div class="space-y-2">
                        <label for="salary_increase" class="block text-sm font-mono text-gray-700">
                            昇給
                            <span class="text-red-500">*</span>
                        </label>
                        <!-- Radio Buttons -->
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="salary_increase_option" id="salary_increase_option" value="可"
                                       class="rounded border-gray-400" onclick="toggleInput(true)">
                                <span>あり</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="salary_increase_option" id="salary_increase_option" value="不可"
                                       class="rounded border-gray-400" onclick="toggleInput(false)">
                                <span>なし</span>
                            </label>
                        </div>

                        <!-- Conditional Inputs for "Yes" -->
                        <div id="range_inputs" class="hidden space-y-2 justify-normal">
                            <div>
                                <label for="salary_increase_from" class="block text-sm text-gray-700">から</label>
                                <input type="text" id="salary_increase_from" name="salary_increase_from"
                                       class=" rounded-md border border-gray-400"
                                       placeholder="〇〇～〇〇">
                            </div>
                            <div>
                                <label for="to_value" class="block text-sm text-gray-700">まで</label>
                                <input type="text" id="salary_increase_to" name="salary_increase_to"
                                       class=" rounded-md border border-gray-400"
                                       placeholder="〇〇～〇〇">
                            </div>
                        </div>
                    </div> --}}


                    {{-- <div class="space-y-2">
                        <label for="bonus" class="block text-sm font-mono text-gray-700">
                            賞与
                            <span class="text-red-500">*</span>
                        </label>
                        <!-- Radio Buttons -->
                        <div class="flex items-center space-x-4">

                            <label class="flex items-center space-x-2">
                                <input type="radio" name="bonus_increase_option" id="bonus_increase_option" value="可"
                                       class="rounded border-gray-400" onclick="toggleInput2(true)">
                                <span>あり</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="bonus_increase_option" id="bonus_increase_option" value="不可"
                                       class="rounded border-gray-400" onclick="toggleInput2(false)">
                                <span>なし</span>
                            </label>
                        </div>

                        <!-- Conditional Inputs for "Yes" -->
                        <div id="range_inputs2" class="hidden space-y-2 justify-normal">
                            <div>
                                <label for="from_value" class="block text-sm text-gray-700">から</label>
                                <input type="text" id="bonus_increase_from" name="bonus_increase_from"
                                       class=" rounded-md border border-gray-400"
                                       placeholder="〇〇～〇〇">
                            </div>
                            <div>
                                <label for="to_value" class="block text-sm text-gray-700">まで</label>
                                <input type="text" id="bonus_increase_to" name="bonus_increase_to"
                                       class=" rounded-md border border-gray-400"
                                       placeholder="〇〇～〇〇">
                            </div>
                        </div>
                    </div> --}}

                    <!--data baigaa-->

                    {{-- <div class="space-y-2">
                        <label for="working_hour" class="block text-sm font-mono text-gray-700">
                            労働時間
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="working_hour" id="working_hour"
                            class="w-full rounded-md border border-gray-400"
                            placeholder="勤務時間を入力してください" required>
                    </div> --}}

                    <div class="space-y-2">
                        <label for="overtime_hour" class="block text-sm font-mono text-gray-700">
                           時間外労働
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="overtime_hour" id="overtime_hour"
                            class="w-full rounded-md border border-gray-400"
                            placeholder="月平均〇〇時間" required>
                    </div>

                    <div class="space-y-2">
                        <label for="break" class="block text-sm font-mono text-gray-700">
                           休憩時間
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="break" id="break"
                            class="w-full rounded-md border border-gray-400"
                            placeholder="〇〇分" required>
                    </div>

                    <div class="space-y-2">
                        <label for="holidays" class="block text-sm font-mono text-gray-700">
                            休日
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="holidays" id="holidays"
                            class="w-full rounded-md border border-gray-400"
                            placeholder="休日を入力してください。" required>
                    </div>

                    <div class="space-y-2">
                        <label for="holiday_type" class="block text-sm font-mono text-gray-700">
                            休暇
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="holiday_type" id="holiday_type"
                            class="w-full rounded-md border border-gray-400"
                            placeholder="休暇を入力してください" required>
                    </div>

                    <div class="space-y-2">
                        <label for="insurance" class="block text-sm font-mono text-gray-700">
                            加入保険
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="insurance" id="insurance"
                            class="w-full rounded-md border border-gray-400"
                            placeholder="加入保険を入力してください。" required>
                    </div>

                    <div class="space-y-2">
                        <label for="insurance" class="block text-sm font-mono text-gray-700">
                           退職金制度
                            <span class="text-red-500">*</span>
                        </label>

                        <div class="flex items-center space-x-4">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="fire_option" id="fire_option" value="可"
                                       class="rounded border-gray-400" >
                                <span>あり</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="fire_option" id="fire_option" value="不可"
                                       class="rounded border-gray-400" >
                                <span>なし</span>
                            </label>
                        </div>

                    </div>

                    <div class="space-y-2">
                        <label for="insurance" class="block text-sm font-mono text-gray-700">
                           入居可能住居
                            <span class="text-red-500">*</span>
                        </label>

                        <div class="flex items-center space-x-4">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="house_option" id="house_option" value="可"
                                       class="rounded border-gray-400" >
                                <span>あり</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="house_option" id="house_option" value="不可"
                                       class="rounded border-gray-400" >
                                <span>なし</span>
                            </label>
                        </div>

                    </div>
                    <div class="space-y-2">
                        <label for="insurance" class="block text-sm font-mono text-gray-700">
                            産休育休制度
                            <span class="text-red-500">*</span>
                        </label>

                        <div class="flex items-center space-x-4">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="childcare_option" id="childcare_option" value="可"
                                       class="rounded border-gray-400" >
                                <span>あり</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="childcare_option" id="childcare_option" value="不可"
                                       class="rounded border-gray-400" >
                                <span>なし</span>
                            </label>
                        </div>

                    </div>
                    <!---->
                    <div class="space-y-2">
                        <label for="smoke" class="block text-sm font-mono text-gray-700">
                            敷地内禁煙喫煙場所
                            <span class="text-red-500">*</span>
                        </label>

                        <div class="flex items-center space-x-4">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="smoke_option" id="smoke_option" value="可"
                                       class="rounded border-gray-400" >
                                <span>あり</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="smoke_option" id="smoke_option" value="不可"
                                       class="rounded border-gray-400" >
                                <span>なし</span>
                            </label>
                        </div>

                    </div>

                    <div class="space-y-2">
                        <label for="other" class="block text-sm font-medium text-gray-700">
                            備考
                        </label>
                        <textarea name="other" id="other" rows="4"
                            class="w-full rounded-md border border-gray-400"
                            placeholder="その他の情報を入力してください。"></textarea>
                    </div>

                    <div class="space-y-2">
                        <label for="tags" class="block text-sm font-medium text-gray-700">
                           分類
                        </label>
                        <select name="tags[]" multiple
                            class="w-full rounded-md border border-gray-400 ">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                        <!-- Form Actions -->
                        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-100">
                            <a href="{{ route('jobpost.index') }}"
                                class="px-6 py-2.5 rounded-lg text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                                キャンセル
                            </a>
                            <button type="submit"
                                class="px-6 py-2.5 rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                               保存
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script>
            function toggleInput(show){
                const rangeInputs=document.getElementById('range_inputs');

                if(show){
                    rangeInputs.classList.remove('hidden');
                }else{
                    rangeInputs.classList.add('hidden');
                }
            }

            function toggleInput2(show){
                const rangeInputs2=document.getElementById('range_inputs2');

                if(show){
                    rangeInputs2.classList.remove('hidden');
                }else{
                    rangeInputs2.classList.add('hidden');
                }
            }


            function toggleWorkingHours(type)
            {
                const fixedHoursInput=document.getElementById('fixed_hours_input');
                const shiftHoursInputs =document.getElementById('shift_hours_inputs');

                if(type==='fixed'){
                    fixedHoursInput.classList.remove('hidden');
                    shiftHoursInputs.classList.add('hidden');

                    document.getElementById('working_hour_b_1').value='';
                    document.getElementById('working_hour_b_2').value='';
                    document.getElementById('working_hour_b_3').value='';
                }else{
                    fixedHoursInput.classList.add('hidden');
                    shiftHoursInputs.classList.remove('hidden');

                    document.getElementById('working_hour_a').value='';
                }
            }



            document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('category_id');
    const subcategorySelect = document.getElementById('category2_id');

    // Add CSRF token to all fetch requests
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    categorySelect.addEventListener('change', function() {
        const categoryId = this.value;

        // Clear current subcategories
        subcategorySelect.innerHTML = '<option value="">職種選択</option>';

        if (categoryId) {
            // Disable subcategory select while loading
            subcategorySelect.disabled = true;
            subcategorySelect.innerHTML = '<option value="">読み込み中...</option>';

            // Use the correct URL with Laravel's route
            fetch(`{{ route('get.subcategories', '') }}/${categoryId}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                subcategorySelect.innerHTML = '<option value="">職種選択</option>';
                data.forEach(subcategory => {
                    const option = document.createElement('option');
                    option.value = subcategory.id;
                    option.textContent = subcategory.name;
                    subcategorySelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error:', error);
                subcategorySelect.innerHTML = '<option value="">Error loading subcategories</option>';
            })
            .finally(() => {
                subcategorySelect.disabled = false;
            });
        }
    });
});



        </script>
    </x-app-layout>
