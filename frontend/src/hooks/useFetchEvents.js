import { useEffect, useState } from 'react';
import { eventsMapper } from '../../utils/eventsMapper';
import tmp from '../../data/z backendu.json';

export const useFetchEvents = () => {
  const [events, setEvents] = useState(null);
  const [error, setError] = useState(false);

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
      .then((data) => setEvents(eventsMapper(data)))
      // .catch(() => setError(true));
      .catch(() => setEvents(JSON.parse(tmp))); // Nie mam neta, todo: obsluga bledow
  }, []);

  return { events, hasError: error };
};
