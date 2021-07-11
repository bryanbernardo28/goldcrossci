// var questions = [{
// 	"question": "127 + 56?",
// 	"option1": "174",
// 	"option2": "171",
// 	"option3": "183",
// 	"option4": "185",
// 	"answer": "183"

// },

// {
// 	"question": "163-87?",
// 	"option1": "54",
// 	"option2": "74",
// 	"option3": "76",
// 	"option4": "86",
// 	"answer": "86"
		
// }
// ,

// {
// 	"question": "79+36?",
// 	"option1": "124",
// 	"option2": "116",
// 	"option3": "114",
// 	"option4": "115",
// 	"answer": "115"
// },

// {
// 	"question": "91/7?",
// 	"option1": "12",
// 	"option2": "15",
// 	"option3": "13",
// 	"option4": "17",
// 	"answer": "13"
// },

// {
// 	"question": "153*6?",
// 	"option1": "918",
// 	"option2": "858",
// 	"option3": "868",
// 	"option4": "921",
// 	"answer": "918"
// },

// {
// 	"question": "34*7?",
// 	"option1": "237",
// 	"option2": "238",
// 	"option3": "338",
// 	"option4": "240",
// 	"answer": "238"
// },

// {
// 	"question": "576/6?",
// 	"option1": "91",
// 	"option2": "86",
// 	"option3": "84",
// 	"option4": "96",
// 	"answer": "96"
// },

// {
// 	"question": "46-27?",
// 	"option1": "29",
// 	"option2": "16",
// 	"option3": "19",
// 	"option4": "17",
// 	"answer": "19"
// },

// {
// 	"question": "55+70?",
// 	"option1": "134",
// 	"option2": "125",
// 	"option3": "135",
// 	"option4": "134",
// 	"answer": "125"
// },

// {
// 	"question": "11*14?",
// 	"option1": "158",
// 	"option2": "138",
// 	"option3": "154",
// 	"option4": "164",
// 	"answer": "154"
// },

// {
// 	"question": "pacify:appease - oust:?",
// 	"option1": "resort",
// 	"option2": "shift",
// 	"option3": "eject",
// 	"option4": "accept ",
// 	"answer": "eject "
// },

// {
// 	"question": "huge: large - minute:?",
// 	"option1": "short",
// 	"option2": "big",
// 	"option3": "tiny",
// 	"option4": "plump ",
// 	"answer": "tiny"
// },

// {
// 	"question": "equalize: balance - match: ?",
// 	"option1": "mate",
// 	"option2": "copy",
// 	"option3": "even",
// 	"option4": "couple ",
// 	"answer": "even"
// },

// {
// 	"question": "productive: fertile - enthusiastic:?",
// 	"option1": "relectuant",
// 	"option2": "lazy",
// 	"option3": "busy",
// 	"option4": "active",
// 	"answer": "active"
// },

// {
// 	"question": "abandon: desert - cherish: ?",
// 	"option1": "value",
// 	"option2": "kindness",
// 	"option3": "obedience",
// 	"option4": "politeness",
// 	"answer": "value"
// },

// {
// 	"question": "praise: criticize - enjoy: ?",
// 	"option1": "deplore",
// 	"option2": "degrade",
// 	"option3": "depress",
// 	"option4": "deprive",
// 	"answer": "depress"
// },

// {
// 	"question": "tense: relax - bewilder: ?",
// 	"option1": "disturb",
// 	"option2": "enlighten",
// 	"option3": "perplex",
// 	"option4": "concentrate",
// 	"answer": "enlighten"
// },

// {
// 	"question": "difficulty: ease - jeopardy: ?",
// 	"option1": "caution",
// 	"option2": "harmless",
// 	"option3": "safety",
// 	"option4": "inertia",
// 	"answer": "safety"
// },

// {
// 	"question": "affluent: deprived - partially: ?",
// 	"option1": "fairness",
// 	"option2": "injustice",
// 	"option3": "favoritism",
// 	"option4": "generosity ",
// 	"answer": "fairness"
// },

// {
// 	"question": "ambiguous: clear - tedious: ?",
// 	"option1": "hard",
// 	"option2": "difficult",
// 	"option3": "light",
// 	"option4": "varied",
// 	"answer": "light"
// }

// ];


// $(function(){
// 	$.get( base_url+"admin/exam_questions_api", function(data) {
// 		// console.log(JSON.parse(data));
// 		// console.log("questions",questions);
// 		questions = data;
// 	});
// 	// .done(function() {
// 	// 	// alert( "second success" );
// 	// })
// });