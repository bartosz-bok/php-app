export const EventEditor = () => {
  return new Array(100).fill(1).map((e, i) => {
    return <div key={i}>{`Event editor ${i}`}</div>;
  });
};
