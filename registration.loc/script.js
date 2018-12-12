$(document).ready(function () {
	// Табы на JS
	$(".dws-form").on("click", ".tab", function() {
		//удаляем классы active
		// $(".dws-form .tab").removeClass("active");
		$(".dws-form").find(".active").removeClass("active");

		//Добавляем класс active
		$(this).addClass("active");
		// .eq() позволяет выбрать элемент с конкретным индексом из набора выбранных элементов
		$(".tab-form").eq($(this).index()).addClass("active");
	});
});