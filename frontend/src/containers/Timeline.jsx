import { useEffect, useState } from 'react';
import { TimelineComponent } from '../components/Timeline';
import { eventsMapper } from '../../utils/eventsMapper';

export const Timeline = () => {
  const [data, setData] = useState(null);

  useEffect(() => {
    let formData = new FormData();
    formData.append('event_name', 'display_events');
    fetch('/api', {
      method: 'POST',
      headers: {
        'Access-Control-Allow-Origin': '*',
      },
      body: formData,
    })
      .then((res) => res.json())
      .then((data) => setData(eventsMapper(data)));
  }, []);

  return <TimelineComponent data={data} />;
};
