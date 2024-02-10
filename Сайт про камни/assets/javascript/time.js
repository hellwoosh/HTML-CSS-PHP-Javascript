    /* функция добавления ведущих нулей */
    /* (если число меньше десяти, перед числом добавляем ноль) */
    function zero_first_format(value)
    {
        if (value < 10)
        {
            value='0'+value;
        }
        return value;
    }

    /* функция получения текущей даты и времени */
    function year_time()
    {
        var current_datetime = new Date();
        var year = current_datetime.getFullYear();

        return year;
    }

    function month_time()
    {
        var current_datetime = new Date();
        var month = zero_first_format(current_datetime.getMonth()+1);

        return month;
    }

    function day_time()
    {
        var current_datetime = new Date();
        var day = zero_first_format(current_datetime.getDate());

        return day;
    }

    function hour_time()
    {
        var current_datetime = new Date();

        var hour = zero_first_format(current_datetime.getHours());

        return hour;
    }

    function minute_time()
    {
        var current_datetime = new Date();

        var minute = zero_first_format(current_datetime.getMinutes());

        return minute;
    }

    function second_time()
    {
        var current_datetime = new Date();
        var second = zero_first_format(current_datetime.getSeconds());

        return second;
    }

    /* каждую секунду получаем текущую дату и время */
    /* и вставляем значение в блок с id " " */
    setInterval(function () {
    document.getElementById('Year').innerHTML = year_time();
    document.getElementById('Month').innerHTML = month_time();
    document.getElementById('Day').innerHTML = day_time();
    document.getElementById('Hour').innerHTML = hour_time();
    document.getElementById('Minute').innerHTML = minute_time();
    document.getElementById('Second').innerHTML = second_time();
    }, 1000);