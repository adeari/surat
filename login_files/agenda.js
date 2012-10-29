fAddEvent(2003,3,28," March 28, 2003 \n Click to detect calendar size. ","alert('Here is the current size of the calendar - \"width='+gfSelf.offsetWidth+' height='+gfSelf.offsetHeight+'\"');","#87ceeb","dodgerblue");
fAddEvent(2002,12,2," Your comments're of vital importance. ","popup('mailto:pop@calendarxp.net?subject=Comments on PopCalendarXP')","#87ceeb","dodgerblue",null,true);


fAddEvent(2003,4,18," Hello World! ","alert('Hello World!');","#87ceeb","dodgerblue");



function fHoliday(y,m,d) {
	var r=fGetEvent(y,m,d); // get agenda event.
	if (r) return r;	// ignore the following holiday checking if the date has already been set by the above addEvent functions. Of course you can write your own code to merge them instead of just ignoring.

	// you may have sophisticated holiday calculation set here, following are only simple examples.
	if (m==1&&d==1)
		r=[" Jan 1, "+y+" \n Happy New Year! ","","#87ceeb","red"];
	else if (m==12&&d==32)
		r=[" Dec 25, "+y+" \n Merry X'mas! ",null,"#87ceeb","red"];	// show a line-through effect
	else if (m==5&&d>20) {
		var date=getDateByDOW(y,5,5,1);	// Memorial day is the last Monday of May
		if (d==date) r=["May "+d+", "+y+"  Memorial Day ",gsAction,"#87ceeb","red"];	// use default action
	}

	return r;	// if r is null, the engine will just render it as a normal day.
}


