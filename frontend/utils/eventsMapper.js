// Do tego potrzebuje jakies zdjecia do katogorii

// const getCategoryIcon = (continentId) => {
//   switch (continentId) {
//     case 1:
//       return 'public/jakieś zdjęcie moze kontynentu'
//     case 2:
//       return 'public/jakieś zdjęcie moze kontynentu'
//     case 3:
//       return 'public/jakieś zdjęcie moze kontynentu'
//     case 4:
//       return 'public/jakieś zdjęcie moze kontynentu'
//     case 5:
//       return 'public/jakieś zdjęcie moze kontynentu'
//     case 6:
//       return 'public/jakieś zdjęcie moze kontynentu'
//     case 7:
//       return 'public/jakieś zdjęcie moze kontynentu'
//     default:
//       return undefined;
//   }
// };

export const eventsMapper = (events) =>
  events.map((event) => {
    const startDate = new Date(event.start_date);
    const endDate = new Date(event.end_date);
    return {
      text: {
        headline: event.event_name,
        text: event.description,
      },
      media: {
        url: '//live.staticflickr.com/7340/11577202425_34b8e573cd_3k.jpg',
        caption: 'Mozna dodac podpisy do zdjec tez.',
        // credit: "flickr/<a href='http://www.flickr.com/photos/tm_10001/'>tm_10001</a>", // A to juz yebać
      },
      start_date: {
        month: startDate.getMonth() + 1,
        day: startDate.getDate(),
        year: startDate.getFullYear(),
      },
      end_date: {
        month: endDate.getMonth() + 1,
        day: endDate.getDate(),
        year: endDate.getFullYear(),
      },
    };
  });
